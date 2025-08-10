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
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date modification</th>
                    <th>Heure modification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemple utilisateur 1 -->
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Jean Dupont</td>
                    <td class="text-center">jean.dupont@example.com</td>
                    <td class="text-center">2025-08-10</td>
                    <td class="text-center">14:35</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm me-2">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
                <!-- Exemple utilisateur 2 -->
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">Marie Curie</td>
                    <td class="text-center">marie.curie@example.com</td>
                    <td class="text-center">2025-08-09</td>
                    <td class="text-center">09:12</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm me-2">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
                <!-- Exemple utilisateur 3 -->
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">Ahmed Diallo</td>
                    <td class="text-center">ahmed.diallo@example.com</td>
                    <td class="text-center">2025-08-08</td>
                    <td class="text-center">17:50</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm me-2">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
