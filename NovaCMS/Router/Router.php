<?php
  require_once('Route.php');
  class Router {
    private $table = array();

    public function __construct($controller) {
      $index = strtolower($controller);
      $controller = ucfirst(strtolower($controller));
      $model = $controller . "Model";
      $controller = $controller . "Controller";
      $this->table[$index] = new Route($model, $controller);
    }

    public function getRoute($routeName) {
      $routeName = strtolower($routeName);
      return $this->table[$routeName];
    }
  }
?>
