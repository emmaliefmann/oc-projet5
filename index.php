<?php 

use emmaliefmann\recipes\config\Autoloader;
use emmaliefmann\recipes\config\Router;

require('./config/autoloader.php');
Autoloader::register();
session_start();

$router = new Router();
$router->run();