<?php

// include
require_once 'app.php';

require_once 'model.php';
require_once 'controller.php';
require_once 'view.php';

require_once 'config.php';
require_once 'package.php';
require_once 'route.php';
require_once 'request.php';


// error reporting
error_reporting(Config::get()->site->debug ? E_ALL : 0);
ini_set('display_errors', Config::get()->site->debug);

// session
session_start();

// init
$app = new App;
$app->init();
