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

  public function getController()
  {
    $router = new Router;

    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');

    $routes = $xml->getElementByTagName('route');

    //On parcours les routes du fichier xml
    foreach ($routes as $route)
    {
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }

      //On ajoute la route au routeur
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }

    try {
      // On récupère la route correspondante à l'URL
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    } catch (\RuntimeException $e) {
      if ($e->getCode() == Router::NO_ROUTE)
      {
        // si aucune route ne correspond, c'est que la page demandé n'existe parcours
        $this->HTTPResponse->redirect404();
      }
    }

    //On ajoute les variables de l'URL au tableau $_GET
    $_GET = array_merge($_GET, $matchedRoute->vars());

    // On instancie le controlleur
    $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
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
