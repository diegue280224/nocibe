<?php
require_once 'app/models/model.php';
require_once 'app/controllers/controller.php';

$controller = new Controladmin();
$model = new modeladmin();
        
if(!$model->verifie_connect()){
    header("Location: index.php?action=loginForm");
}
elseif($controller->logout()){
    header("Location: index.php?action=loginForm");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="desing/css/styleadmin.css">
    <title>Admin panel</title>
</head>
<body>
    <a href="index.php?action=add_dep">Ajouter un département</a><br><br>
    <a href="index.php?action=add_users">Ajouter un utilisateur</a><br><br>
    <a href="index.php?action=add_dep">Ajouter un département</a><br><br>
    <a href="index.php?action=logout">Se déconnecter</a><br><br>

</body>
</html>