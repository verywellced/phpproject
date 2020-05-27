<?php
require('config.php');
require('classes/bootstrap.php');
require('classes/controller.php');
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller) {
    $controller->executeAction();
}

?>