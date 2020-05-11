<?php
namespace App\Config;


define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);
define('ASSETS_URL', SITE_URL . '/assets/');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ASSETS_PATH', ROOT . '/assets/');

