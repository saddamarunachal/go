<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/ReportController.php';
$controller = new ReportController($db);

$type = $_GET['type'] ?? '';
switch ($type) {
  case 'clients_csv': $controller->clientsCsv(); break;
  case 'clients_pdf': $controller->clientsPdf(); break;
  case 'leads_csv': $controller->leadsCsv(); break;
  case 'leads_pdf': $controller->leadsPdf(); break;
  default: include __DIR__.'/../views/reports/index.php';
}
?>
