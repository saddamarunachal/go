<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/LeadController.php';
require_once __DIR__.'/../models/Lead.php';
$controller = new LeadController($db);
$action = $_GET['action'] ?? 'list';

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
    header('Location: leads.php');
    exit;
} elseif ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_GET['id'], $_POST);
    header('Location: leads.php');
    exit;
} elseif ($action === 'delete') {
    $controller->delete($_GET['id']);
    header('Location: leads.php');
    exit;
}

if ($action === 'create') {
    $lead = [];
    include __DIR__.'/../views/leads/form.php';
} elseif ($action === 'edit') {
    $lead = (new Lead($db))->all();
    $lead = array_values(array_filter($lead, fn($l) => $l['id'] == $_GET['id']))[0] ?? [];
    include __DIR__.'/../views/leads/form.php';
} else {
    $search = $_GET['q'] ?? '';
    $leads = $controller->index($search);
    include __DIR__.'/../views/leads/index.php';
}
?>
