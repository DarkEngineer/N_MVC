<?php
  require_once('novacms/Model/Model.php');
  require_once('novacms/Controller/Controller.php');
  class Route {
    private $model;
    private $controller;

    public function __construct($model, $controller) {
      $this->model = $model;
      $this->controller = $controller;
    }

    public function getController() {
      return $this->controller;
    }

    public function getModel() {
      return $this->model;
    }
  }
?>
