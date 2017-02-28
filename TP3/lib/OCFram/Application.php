<?php
namespace OCFram;

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;

  public function __construct()
  {
    $this->httpRequest = new HTTPRequest;
    $this->httpResponse = new HTTPResponse;
    $this->name = '';

  }

  abstract public function run();

  public function httpRequest()
  {
    return $this->HttpRequest;
  }

  public function httpResponse()
  {
    return $this->HttpResponse;
  }

  public function name()
  {
    return $this->name;
  }
}


 ?>
