<?php
  require_once('novacms/Model/Model.php');
  abstract class View {
    protected $model;
    protected $route;

    public function __construct($route, Model $model) {
      $this->route = $route;
      $this->model = $model;
    }

    abstract function output();
  }
?>
