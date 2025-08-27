<?php
require_once __DIR__.'/../config/init.php';
require_once __DIR__.'/../controllers/AuthController.php';
$controller = new AuthController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->login($_POST['email'], $_POST['password'])) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
include __DIR__.'/../views/auth/login.php';
?>
