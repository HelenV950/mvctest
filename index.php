<?php
require_once 'vendor/autoload.php';
require_once 'App/Config/constants.php';
require_once 'App/Config/functions.php';
require_once 'App/Config/config.php';

use App\Components\Router;

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


define('ROOT', dirname(__FILE__));

session_start();



$router = new Router();
try {
  $router->run();
} catch (Exception $exertion) {
  echo '<pre>' . print_r($exertion->getFile(), true) . '</pre>';
  echo '<pre>' . print_r($exertion->getLine(), true) . '</pre>';
  echo '<pre>' . print_r($exertion->getCode(), true) . '</pre>';
  echo '<pre>' . print_r($exertion->getMessage(), true) . '</pre>';
}

