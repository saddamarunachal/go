<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Admin') { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/UserController.php';
require_once __DIR__.'/../models/User.php';
$controller = new UserController($db);
$action = $_GET['action'] ?? 'list';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
    header('Location: users.php');
    exit;
} elseif ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateRole($_GET['id'], $_POST['role']);
    header('Location: users.php');
    exit;
}

if ($action === 'create') {
    $user = [];
    include __DIR__.'/../views/users/form.php';
} elseif ($action === 'edit') {
    $all = $controller->index();
    $user = array_values(array_filter($all, fn($u) => $u['id'] == $_GET['id']))[0] ?? [];
    include __DIR__.'/../views/users/form.php';
} else {
    $users = $controller->index();
    include __DIR__.'/../views/users/index.php';
}
?>
