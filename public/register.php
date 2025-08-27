<?php
require_once __DIR__.'/../config/init.php';
require_once __DIR__.'/../controllers/AuthController.php';
$controller = new AuthController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->register($_POST)) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'User exists';
    }
}
include __DIR__.'/../views/auth/register.php';
?>
