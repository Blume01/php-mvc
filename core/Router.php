<?php

namespace Core;

class Router
{
  private $routes = [];

  public function add($pattern, $callback) {
    $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9\-]+)', $pattern);
    $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';

    $this->routes[$pattern] = $callback;
}

  public function dispatch($url)
  {
    foreach ($this->routes as $pattern => $callback) {
      if (preg_match($pattern, $url, $params)) {
        $params = array_filter($params, 'is_string', ARRAY_FILTER_USE_KEY);

        return call_user_func_array($callback, $params);
      }
    }
    $this->render('404');
  }

  protected function render($view, $data = [])
  {
    extract($data);

    $viewFile = __DIR__ . '/../app/views/' . $view . '.php';

    if (file_exists($viewFile)) {
      include $viewFile;
    } else {
      echo "View '{$view}' não encontrada.";
    }
  }
}
