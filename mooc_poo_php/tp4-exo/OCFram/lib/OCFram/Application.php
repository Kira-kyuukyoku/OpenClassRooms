<?php
namespace OCFram;

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;
  protected $user;
  protected $config;
  protected $fileCache;

  public function __construct()
  {
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);

    $this->name = '';
    $this->user = new User($this);
    $this->config = new Config($this);
    $this->cache = new Cache($this);
  }

  public function getController()
  {
    $router = new Router;

    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');

    $routes = $xml->getElementsByTagName('route');

    // On parcourt les routes du fichier XML.
    foreach ($routes as $route)
    {
      $vars = [];

      // On regarde si des variables sont présentes dans l'URL.
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }

      // On ajoute la route au routeur.
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }

    try
    {
      // On récupère la route correspondante à l'URL.
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == Router::NO_ROUTE)
      {
        // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
        $this->httpResponse->redirect404();
      }
    }

    // On ajoute les variables de l'URL au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());

    // Si le fichier est en cache on le charge
    $fileCache  = $this->name . '_' . $matchedRoute->module() . '_' . $matchedRoute->action() . '.cache';
    $cacheDuree = $this->app->config()->get('cache_duree');
    $cacheDir   = __DIR__.'/../../'.$this->app->config()->get('cache_dir');

    if ( $this->cache->cacheExist($fileCache, $cacheDir, $cacheDuree) )
    {
        $this->httpResponse->sendCache($cacheDir.$fileCache);
    }
    else
    {
      // sinon on instancie le contrôleur.
      $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
      return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
    }

  }

  abstract public function run();

  public function httpRequest()
  {
    return $this->httpRequest;
  }

  public function httpResponse()
  {
    return $this->httpResponse;
  }

  public function name()
  {
    return $this->name;
  }

  public function user()
  {
    return $this->user;
  }

  public function config()
  {
    return $this->config;
  }

}