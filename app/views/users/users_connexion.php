<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - NOCIBE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://img.freepik.com/photos-premium/vue-aerienne-cimenterie-structure-usine-beton-elevee-grue-tour-dans-zone-production-industrielle-concept-fabrication-industrie-mondiale_127089-15286.jpg?w=2000') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.92);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.2);
            max-width: 420px;
            width: 100%;
        }
        .form-title {
            font-weight: bold;
            color: #0d6efd;
        }
        .form-text {
            font-size: 0.9rem;
            color: #555;
        }
        .btn-custom {
            background-color: #0d6efd;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #084298;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1 class="text-center form-title mb-3">Connexion</h1>
    <p class="text-center form-text mb-4">
        Veuillez entrer vos informations pour vous connecter.
    </p>

    <form method="POST" action="traitement.php">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex:utilisateur@gmail.com" value="" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" required>
        </div>
        <button type="submit" class="btn btn-custom w-100">Se connecter</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
