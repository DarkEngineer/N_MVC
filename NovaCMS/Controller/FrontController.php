<?php
  require_once('novacms/Router/Router.php');
  class FrontController {
    private $controller;
    private $view;

    public function __construct(Router $router, $routeName, $action = NULL) {
      $route = $router->getRoute($routeName);
      $modelName = $route->getModel();
      $controllerName = $route->getController();
      try{
        $path = 'novacms/Model/'. ucfirst(strtolower($routeName)). 'Model.php';
        if(is_file($path)){
          require_once($path);
        }
        else {
          throw new Exception('Unable to find file of ' . ucfirst(strlower($routeName)) . ' at ' . $path);
        }
        $path = 'novacms/Controller/' . ucfirst(strtolower($routeName)) . 'Controller.php';
        if(is_file($path)){
          require_once($path);
        }
        else {
          throw new Exception('Unable to find file of ' . ucfirst(strtolower($routeName)) . ' at ' . $path);
        }

        $path = 'novacms/View/' . ucfirst(strtolower($routeName)) . 'View.php';
        if(is_file($path)){
          require_once($path);
        }
        else {
          throw new Exception('Unable to find file of ' . ucfirst(strtolower($routeName)) . ' at ' . $path);
        }
      }
      catch (Exception $e){
        echo 'Caught exception: ', $e->getMessage(), '<br/>';
        exit;
      }
      $model = new $modelName();
      $viewName = ucfirst(strtolower($routeName)) . 'View';
      $this->view = new $viewName($routeName, $model);
      $this->controller = new $controllerName($model, $this->view);

      if(!empty($action))
        $this->controller->$action();
    }


  }
?>
