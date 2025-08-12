<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
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
        .login-container {
            max-width: 400px;
            width: 100%;
        }
        
        .login-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .login-header {
            color: #0d6efd;
            font-weight: 600;
        }
        
        .error-message {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="login-container">
        <div class="card login-card p-4">
            <div class="card-body">
                <h2 class="text-center login-header mb-4">Connexion admin</h2>
                <?php if (!empty($erreur)){?>
                <div class="error"><?php echo $erreur ?></div>
                <?php }; ?>

                <form method="POST" action="index.php?action=login">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control py-2" id="email" name="email" required>                 
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control py-2" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>