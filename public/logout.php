<?php
require_once __DIR__.'/../config/init.php';
require_once __DIR__.'/../controllers/AuthController.php';
$controller = new AuthController($db);
$controller->logout();
header('Location: login.php');
exit;
?>
