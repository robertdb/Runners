<?php

namespace App\Scrapy;

use App\InfoMarathon;
use App\Scrapy\Parser;
use App\Scrapy\DataWeb;


/**
 * Scrapy marathons from maraton.com.ar
 */
class ParserMarathonWeb extends Parser
{


  function __construct()
  {
    parent::__construct('http://maraton.com.ar/calendario-de-carreras/');
  }

  public function getInfoMarathons(){

    echo "Loading";

    $links = [];
    //$tt = DataWeb::createDataWeb($this->url);
    $nodeList = $this->data->query("//*[@class='evo_event_schema']//a/@href");
    foreach ($nodeList as $node) {
    	if(!in_array($node ->nodeValue, $links)){
    		$links[] = $node ->nodeValue;
    	}
    }

    $races = [];
    $totalRaces = count($links);
    $percentage = 0;
    $count = 0;
    foreach ($links as $link) {

      echo '...'.$percentage.'%' ;

      $marathon = new InfoMarathon();
      $marathon->description = null;
    	$info = new DataWeb($link);

    	//title
    	$nodeH1 = $info->query("//*[@class='evcal_desc2 evcal_event_title']");
    	if (!empty($nodeH1 ->item(0))){
    		//echo 'Titulo:<h3> '.$nodeH1 ->item(0)->nodeValue.'</h3>';
        $marathon->title = $nodeH1->item(0)->nodeValue;
    	}


    	//image
    	$nodeImg = $info  ->query("//*[@class='evo_metarow_directimg']//img/@src");
    	if (!empty($nodeImg ->item(0))){
        $marathon->img = $nodeImg ->item(0)->nodeValue;
        //echo '<img src="'.$nodeImg ->item(0)->nodeValue.'">';
    	}

      // date
    	$nodeH1 = $info  ->query("//*[@class='eventon_desc_in']//p/text()[1]");
    	//echo "<pre>";
    	//echo($nodeH1 ->item(0)->nodeValue);
      $marathon->date = $nodeH1 ->item(0)->nodeValue;
    	//echo "</pre>";

      // // hour
    	$nodeH1 = $info ->query("//*[@class='eventon_desc_in']//p/text()[2]");
    	//echo "<pre>";
    	//echo($nodeH1 ->item(0)->nodeValue);
      $marathon->hour = $nodeH1 ->item(0)->nodeValue;
    	//echo "</pre>";

      // distance
    	$nodeH1 = $info  ->query("//*[@class='eventon_desc_in']//p/text()[3]");
    	//echo "<pre>";
    	//echo($nodeH1 ->item(0)->nodeValue);
      $marathon->distance = $nodeH1 ->item(0)->nodeValue;
    	//echo "</pre>";

      // place
    	$nodeH1 = $info  ->query("//*[@class='eventon_desc_in']//p/text()[4]");
    	//echo "<pre>";
    	$dir = $nodeH1 ->item(0)->nodeValue;
      $marathon->address = $dir;
    	//echo($nodeH1 ->item(0)->nodeValue);
    	//echo "</pre>";

    	//location
    	//echo "<pre>";
    	$add = urlencode($dir).'&key=AIzaSyCv2ct01-Nd8vzgRYN2pnUNbMsi2Rfa6Bg';
    	$url='https://maps.googleapis.com/maps/api/geocode/json?address='.$add;
    	//echo $url;
    	//echo "<br>";
      $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
      $context = stream_context_create($opts);
      $json = file_get_contents($url,false,$context);
    	//$json = file_get_contents($url);
    	$array = json_decode($json,TRUE);
    	$location = $array['results'][0]["geometry"]["location"];
    	//var_dump($location);
    	//echo $location["lat"];
      $marathon->lat = $location["lat"];
      $marathon->lng = $location["lng"];
    	//echo $location["lng"];
    	//echo "</pre>";


    	$nodeH1 = $info  ->query("//*[@class='eventon_desc_in']//p//a/@href");
    	//echo "<pre>";
      $marathon->subscribe_link = $nodeH1 ->item(0)->nodeValue;
    	//echo($nodeH1 ->item(0)->nodeValue);
    	//echo "</pre>";

    	//echo '<br>';
    	//echo '--------------------------------------------------------------';
    	//echo '<br>';
      //dd($marathon);
      $races[] = $marathon;


      $count++;
      $percentage = ($count * 100) / $totalRaces;

    }
    echo '...100%'
    return $races;

  }
}
