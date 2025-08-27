<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/ClientController.php';
require_once __DIR__.'/../models/Client.php';
$controller = new ClientController($db);
$action = $_GET['action'] ?? 'list';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
    header('Location: clients.php');
    exit;
} elseif ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_GET['id'], $_POST);
    header('Location: clients.php');
    exit;
} elseif ($action === 'delete') {
    $controller->delete($_GET['id']);
    header('Location: clients.php');
    exit;
}

if ($action === 'create') {
    $client = [];
    include __DIR__.'/../views/clients/form.php';
} elseif ($action === 'edit') {
    $client = (new Client($db))->find($_GET['id']);
    include __DIR__.'/../views/clients/form.php';
} else {
    $search = $_GET['q'] ?? '';
    $clients = $controller->index($search);
    include __DIR__.'/../views/clients/index.php';
}
?>
