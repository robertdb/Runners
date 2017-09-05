<?php

namespace App\Scrapy;

use App\Scrapy\DataWeb as Data;

abstract class Parser
{

  protected $data;

  public function __construct($url)
  {
      $this->data = Data::createDataWeb($url);
  }

  abstract protected function getInfoMarathons();

  public function getData()
  {
    return $this->data;
  }

}
