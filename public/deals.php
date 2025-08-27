<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/DealController.php';
require_once __DIR__.'/../models/Deal.php';
$controller = new DealController($db);
$action = $_GET['action'] ?? 'list';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
    header('Location: deals.php');
    exit;
} elseif ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_GET['id'], $_POST);
    header('Location: deals.php');
    exit;
} elseif ($action === 'delete') {
    $controller->delete($_GET['id']);
    header('Location: deals.php');
    exit;
}

if ($action === 'create') {
    $deal = [];
    include __DIR__.'/../views/deals/form.php';
} elseif ($action === 'edit') {
    $deal = (new Deal($db))->all();
    $deal = array_values(array_filter($deal, fn($d) => $d['id'] == $_GET['id']))[0] ?? [];
    include __DIR__.'/../views/deals/form.php';
} else {
    $deals = $controller->index();
    include __DIR__.'/../views/deals/index.php';
}
?>
