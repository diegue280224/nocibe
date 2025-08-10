<?php 
include_once 'app/models/model.php';
$model = new modeladmin();

$depp = []; 
$dep = $model->recuperer_tous("departements", $ordre = 'DESC');

foreach ($dep as $d) {
    $depp[] = $d['nom_dep']; 
}

?>
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
        .login-box input,
        .login-box select {
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

        <?php if (!empty($erreur)){?>
            <div class="error"><?= $erreur ?></div>
        <?php }; ?>

        <form method="POST" action="index.php?action=add_users">

            <label name="nom_complet">Nom Complet :</label><br>
            <input type="text" name="nom_complet" required><br>

            <label name="email">Email :</label><br>
            <input type="email" name="email" required><br>

            <label name="poste">Poste :</label>br

            <input type="text" name="poste" required><br>

            <label name="departement">Département d'intervenance :</label><br>

            <label name="droit">Droit d'utilisateur :</label><br>
        
            <select name="droit" id="droit">
                <option value="">Sélectionner un droit</option>
                <option value="validation">Droit de validation</option>
                <option value="edite">Droit de création</option>
                <option value="impression">Droit d'impression'</option>
                <option value="tous">Tous les droits</option>
            </select><br>
        
            <select name="departement" id="departement">
                <option value="">Sélectionner une option</option>

                <?php
                if(isset($depp)){
                    foreach ($depp as $key => $value){ ?>
                    <option value="<?php echo htmlspecialchars($value); ?>">
                        <?php echo htmlspecialchars($value); ?>
                    </option>
                <?php } }?>
            </select><br>

            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
