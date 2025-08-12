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
if (isset($_GET['action']) && $_GET['action'] == 'profil') {
    include 'views/admin/profil.php'; // c'est le fichier avec le code profil admin
}
