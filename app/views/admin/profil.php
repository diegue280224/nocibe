<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            background: white;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007bff;
        }
        .btn-upload {
            display: block;
            margin: 10px auto;
            background: #007bff;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form {
            display: grid;
            gap: 15px;
        }
        label {
            font-weight: bold;
            color: #444;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
        }
        .section-title {
            background: #f0f0f0;
            padding: 8px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 5px;
            color: #333;
        }
        .btn-save {
            background: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-save:hover {
            background: #218838;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Mon Profil Administrateur</h1>

    <div class="profile-header">
        <img src="https://via.placeholder.com/120" alt="Photo de profil">
        <button class="btn-upload">Changer la photo</button>
    </div>

    <form action="#" method="post" enctype="multipart/form-data">

        <div class="section-title">Informations personnelles</div>
        <label>Nom complet :</label>
        <input type="text" name="fullname" value="Jean Dupont" required>

        <label>Nom d'utilisateur / Pseudo :</label>
        <input type="text" name="username" value="admin_jean" required>

        <label>Email :</label>
        <input type="email" name="email" value="admin@mail.com" required>

        <label>Téléphone :</label>
        <input type="text" name="phone" value="+229 60 00 00 00">

        <label>Adresse :</label>
        <input type="text" name="address" value="Cotonou, Bénin">

        <div class="section-title">Informations professionnelles</div>
        <label>Poste / Rôle :</label>
        <input type="text" value="Administrateur" readonly>

        <label>Date de création du compte :</label>
        <input type="text" value="01/01/2025" readonly>

        <label>Dernière connexion :</label>
        <input type="text" value="10/08/2025" readonly>

        <div class="section-title">Sécurité</div>
        <label>Ancien mot de passe :</label>
        <input type="password" name="old_password">

        <label>Nouveau mot de passe :</label>
        <input type="password" name="new_password">

        <label>Confirmer le nouveau mot de passe :</label>
        <input type="password" name="confirm_password">

        <div class="section-title">Préférences</div>
        <label>Langue :</label>
        <select name="language">
            <option>Français</option>
            <option>Anglais</option>
        </select>

        <label>Thème :</label>
        <select name="theme">
            <option>Clair</option>
            <option>Sombre</option>
        </select>

        <label>Notifications :</label>
        <select name="notifications">
            <option>Activées</option>
            <option>Désactivées</option>
        </select>

        <button type="submit" class="btn-save">💾 Sauvegarder les modifications</button>

    </form>
</div>

</body>
</html>
