<?php
require_once __DIR__.'/../config/init.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
require_once __DIR__.'/../controllers/DashboardController.php';
$controller = new DashboardController($db);
$kpis = $controller->getKpis();
include __DIR__.'/../views/dashboard/index.php';
?>
