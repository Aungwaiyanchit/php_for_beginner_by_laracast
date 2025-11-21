<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];

  public function get($uri, $controller)
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
    return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    return $this->add('DELETE', $uri, $controller);
  }

  public function path($uri, $controller)
  {
    return $this->add('PATH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
    return $this->add('PUT', $uri, $controller);
  }

  public function only($key)
  {
    return $this->routes[array_key_last($this->routes)]['middleware'] = $key;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        Middleware::reslove($route['middleware']);

        return require base_path("Http/controllers/" . $route['controller']);
      }
    }
    $this->abort();
  }
  public function previousUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  }

  protected function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];
    return $this;
  }


  protected function abort($code = 404)
  {
    http_response_code(404);
    require base_path("views/{$code}.php");
    exit();
  }
}
