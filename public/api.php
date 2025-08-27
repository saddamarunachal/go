<?php
require_once __DIR__.'/../config/init.php';
require_once __DIR__.'/../models/Client.php';
require_once __DIR__.'/../models/Lead.php';

$action = $_GET['action'] ?? '';
header('Content-Type: application/json');
if ($action === 'search_clients') {
    $client = new Client($db);
    echo json_encode($client->search($_GET['q'] ?? ''));
} elseif ($action === 'search_leads') {
    $lead = new Lead($db);
    echo json_encode($lead->search($_GET['q'] ?? ''));
} else {
    echo json_encode(['error' => 'Invalid action']);
}
?>
