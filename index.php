<?php
  if(empty($_REQUEST['controller']) && empty($_REQUEST['action'])){
    header('Location: ?controller=news&action=view');
    exit;
  }
  require_once('novacms/Controller/FrontController.php');

/*
    require_once('novacms/Nova/TemplateFunctions.php');
    if(session_status() === PHP_SESSION_NONE){
      session_start();
      session_regenerate_id(true);
    }
      //$_SESSION['user_id'] = 1;
      //session_unset();
	$template = new TemplateFunctions();
	$template->setWidget('logoPosition', 'logo');
	$template->setWidget('navigationPosition', 'navigation');
  $template->setWidget('advertisementPosition', 'advertisement');
	//$template->setWidget('sidebarPosition', 'hello', array('hello_to'=>'MyCms'));
  if(empty($_REQUEST['app']) && empty($_REQUEST['task'])) {
    header('Location: ?app=news');
    exit;
  }
	$template->show();
*/
  $frontController = new FrontController(new Router($_GET['controller']), $_GET['controller'], isset($_GET['action']) ? $_GET['action'] : null);
   //$frontController->output();
?>
