<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
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
        <h2>Ajouter un utilisateur</h2>

        <?php if ($erreur): ?>
            <div class="error"><?= $erreur ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=inscription">

            <label name="nom_complet">Nom Complet :</label>
            <input type="text" name="nom_complet" required>

            <label name="email">Email :</label>
            <input type="email" name="email" required>

            <label name="poste">Poste :</label>
            <input type="text" name="poste" required>

            <label name="departement">Département d'intervenance :</label>

            <select name="departement" id="departement">
                <option value="">Sélectionner une option</option>

                <?php
                if(isset($dep)){
                    foreach ($dep as $d){
                ?>
                <option value="<?php echo htmlspecialchars($d); ?>">
                        <?php 
                        echo htmlspecialchars($d); ?>
                </option>
                <?php } } ?>
            </select>

            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
