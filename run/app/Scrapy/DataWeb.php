<?php


namespace App\Scrapy;

class DataWeb
{

    private $xpath;


    public static function createDataWeb($url) {

        $array = get_headers($url);

        $string = $array[0];

        if(strpos($string,"200"))
            return new DataWeb($url);

        return null;

    }

    public function __construct($url)
    {
        $this->curl($url, null);

    }

    // Curl
    private function curl($url, $post=''){


            //cURL options
            $options = array(

                CURLOPT_RETURNTRANSFER => true,     // return web page
                CURLOPT_HEADER         => false,    // don't return headers
                CURLOPT_FOLLOWLOCATION => true,     // follow redirects
                CURLOPT_ENCODING       => "",       // handle all encodings
                CURLOPT_AUTOREFERER    => true,     // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 1000,      // timeout on connect
                CURLOPT_TIMEOUT        => 1000,      // timeout on response
                CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_USERAGENT      => "",
                CURLOPT_COOKIESESSION  => false,
                //CURLOPT_COOKIEJAR     => $this->ckfile, // Cookies
                //CURLOPT_COOKIEFILE     => $this->ckfile, //Cookies...yum


            );

            //Go go go!
            $ch = curl_init( $url );
            curl_setopt_array( $ch, $options );

            $output['content'] = curl_exec( $ch );
            $output['err']     = curl_errno( $ch );
            $output['errmsg']  = curl_error( $ch );
            $output['header']  = curl_getinfo( $ch );

            //Create DOM
            $doc = new \DOMDocument;
            @$doc->loadHTML($output['content']);
            $doc->preserveWhiteSpace = false;

            $this ->xpath = new \DOMXpath($doc);
    }

    // post: nodeList to iterate.
    public function query($query)
    {
        return $this->xpath->query($query);

    }
}
