<?php 
include_once 'app/models/model.php';
$model = new modeladmin();

$user = [];
$users = $model->recuperer_tous("users", $ordre = 'DESC');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mise à jour des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="mb-4 text-center">Liste des utilisateurs inscrits</h2>

    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date modification</th>
                    <th>Heure modification</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $n = 1;
            foreach ($users as $us) { ?>
                <tr class="text-center">
                    <td><?= htmlspecialchars($n) ?></td>
                    <td><?= htmlspecialchars($us['nom_complet']) ?></td>
                    <td><?= htmlspecialchars($us['email']) ?></td>
                    <td><?= htmlspecialchars($us['date_enregistrement']) ?></td>
                    <td><?= htmlspecialchars($us['heure']) ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm me-2">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
                <?php $n = $n + 1; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
