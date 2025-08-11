<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #f1f1f1;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-box {
            background: white;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #0D6EFD;
            font-weight: 700;
        }
        label {
            font-weight: 600;
        }
        .error {
            color: #dc3545; /* bootstrap danger color */
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Ajouter un département</h2>

        <?php if (!empty($erreur)){?>
            <div class="error alert alert-danger"><?= $erreur ?></div>
        <?php }; ?>

        <form method="POST" action="index.php?action=add_dep" novalidate>
            <div class="mb-3">
                <label for="nom_dep" class="form-label">Nom du département :</label>
                <input type="text" id="nom_dep" name="nom_dep" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold">Ajouter</button>
        </form>
    </div>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
