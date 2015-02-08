<?php
  require_once('novacms/Model/Model.php');
  abstract class Controller {
    protected $model;
    protected $view;

    public function __construct(Model $model, View $view) {
      $this->model = $model;
      $this->view = $view;
    }
  }
  // metody public function [akcja]() {} w klasach dziedziczących
?>
