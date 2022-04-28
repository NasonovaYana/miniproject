<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

include_once('components/Router.php');
include_once('components/DBConnection.php');



$router = new Router();
$router->run();