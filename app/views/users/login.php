<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 350px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0D6EFD;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box input[type="submit"] {
            background-color: #0D6EFD;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-box .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-box">

        <h2>Connexion</h2>

        <?php if (!empty($erreur)){?>
            <div class="error"><?= $erreur ?></div>
        <?php }; ?>

        <form method="POST" action="index.php?action=connexion">
            
            <label>Email :</label>
            <input type="email" name="email" required>

            <label>Mot de passe :</label>
            <input type="password" name="password" required>

            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>

