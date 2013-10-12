<?php

// include
require_once 'app.php';
require_once 'config.php';
require_once 'module.php';
require_once 'route.php';

require_once 'model.php';
require_once 'controller.php';
require_once 'view.php';


// error reporting
error_reporting(Config::get()->debug ? E_ALL : 0);
ini_set('display_errors', Config::get()->debug);


// init
$app = new App;
$app->init();
