<?php
require_once 'app/controllers/controller.php';

$action = $_GET['action'] ?? 'loginForm';
$controller = new Controladmin();

if (method_exists($controller, $action)) {
    $controller->$action();
}
else {
    echo "Action invalide.";
}