<?php 

  require 'Slim/Slim.php';
  \Slim\Slim::registerAutoloader();


  $config = [
  		'settings'=
  ]
  $app = new \Slim\Slim();
  $app->response()->header('Content-Type', 'application/json;charset=utf-8');

  $app->run();