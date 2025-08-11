<?php
require_once 'app/models/model.php';

class Controladmin {
    public function loginForm() {
        $erreur = "";
        include 'app/views/admin/admin_login.php';
    }

    public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new modeladmin();
            $admin = $model->login($email, $password);

            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin;
                
                $token = bin2hex(random_bytes(64));
                $model->mise_a_jour_token($token, $email);
                setcookie("token", $token, time()+3600);
                setcookie("email", $email, time()+3600);
                
                session_start();
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_email'] = $admin['email'];
                $_SESSION['token'] = $token;
                header("Location: index.php?action=dashboard");
                exit();

            } 
            else {
                $erreur = "Email ou mot de passe incorrect";
                include 'app/views/admin/admin_login.php';
            }
        } else {
            $erreur = "Veuillez remplir tous les champs";
            include 'app/views/admin/admin_login.php';
        }
    }

    public function dashboard() {
        
        if (!isset($_SESSION['admin'])) {
            $model = new modeladmin();
            $model->verifie_connect();
            if(!$model){
                $erreur = "Connexion expirée";
                header("Location: index.php?action=loginForm");
                exit();
            }
            else{
                include 'app/views/admin/dashboard_admin.php';
            }
        }
        else{
            $erreur = "Connexion expirée";
            return header("Location: index.php?action=loginForm");
        }
    }

    public function add_dep(){
        $model = new modeladmin();
        if($model->verifie_connect()){
            if (!empty($_POST['nom_dep']) && isset($_POST['nom_dep'])) {
                $nom_dep = $_POST['nom_dep'];

                $model = new modeladmin();
                $add_dep = $model->add_dep( $nom_dep);

                if($add_dep){
                    return include 'app/views/admin/dashboard_admin.php';
                }
                else{
                    $erreur = "Echec de lors de l'ajout de département";
                    return include 'app/views/admin/add_departement.php';
                }
            }
            else{
                return include 'app/views/admin/add_departement.php';
            }
        }
        else{
            $erreur = "Connexion expirée";
            header("Location: index.php?action=loginForm");
            exit();
        }
        
    }

    public function add_users(){
        $model = new modeladmin();
        
        if($model->verifie_connect()){
            if (!empty(
                $_POST['nom_complet']) && isset($_POST['nom_complet']) && 
                !empty($_POST['email']) && isset($_POST['email']) && 
                !empty($_POST['poste']) && isset($_POST['poste']) &&
                !empty($_POST['droit']) && isset($_POST['droit']) &&
                !empty($_POST['departement']) && isset($_POST['departement'])){

                    date_default_timezone_set('Africa/Porto-Novo');
                    $h = date('H:i:s');

                    $donnees = [
                        "nom_complet" => $_POST['nom_complet'],
                        "email" => $_POST['email'],
                        "poste" => $_POST['poste'],
                        "droit" => $_POST['droit'],
                        "departement" => $_POST['departement'],
                        "heure" => $h
                    ];

                    $model = new modeladmin();
                    $add_users = $model->add_users( $donnees);

                    if($add_users){
                        $email = $donnees["email"];
                        return include 'app/envoie_mail/sendmail.php';
                    }
                    else{
                        $erreur = "Echec de lors de l'ajout...";
                        return include 'app/views/admin/add_users.php';
                    }
            }
            elseif(empty($_POST['nom_complet']) || !isset($_POST['nom_complet'])){
                $erreur = "Entré Nom invalide";
                return include 'app/views/admin/add_users.php';
            }

            elseif(empty($_POST['email']) || !isset($_POST['email'])){
                $erreur = "Email invalide";
                return include 'app/views/admin/add_users.php';
            }

            elseif(empty($_POST['poste']) || !isset($_POST['poste'])){
                $erreur = "Entré Poste invalide";
                return include 'app/views/admin/add_users.php';
            }

            elseif(empty($_POST['droit']) || !isset($_POST['droit'])){
                $erreur = "Entré droit invalide";
                return include 'app/views/admin/add_users.php';
            }

            elseif(empty($_POST['departement']) || !isset($_POST['departement'])){
                $erreur = "Entré Poste invalide";
                return include 'app/views/admin/add_users.php';
            }

            return include 'app/views/admin/add_users.php';
        }
        else{
            $erreur = "Connexion expirée";
            return header("Location: index.php?action=loginForm");
        }
    }

    public function logout(){
        // 1. Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 2. Supprimer toutes les variables de session
        $_SESSION = [];

        // 3. Détruire la session
        session_destroy();

        // 4. Supprimer les cookies de connexion
        if (isset($_COOKIE['email'])) {
            setcookie('email', '', time() - 3600, '/');
        }
        if (isset($_COOKIE['token'])) {
            setcookie('token', '', time() - 3600, '/');
        }

        // 5. Redirection vers la page de connexion
        return header("Location: index.php?action=loginForm");
    }

    public function droit(){
        $model = new modeladmin();
        
        if($model->verifie_connect()){
            return include 'app/views/admin/droit_utilisateur.php';
        }
        else{
            return header("Location: index.php?action=loginForm");
        }
    }

    public function modify_users(){

        $model = new modeladmin();
        
        if($model->verifie_connect()){
            return include 'app/views/admin/mise_a_jour.php';
        }
        else{
            return header("Location: index.php?action=loginForm");
        }

    }

     public function departement(){
        $model = new modeladmin();
        
        if($model->verifie_connect()){
            return include 'app/views/admin/departement.php';
        }
        else{
            return header("Location: index.php?action=loginForm");
        }
    }

    public function historiques(){
        $model = new modeladmin();
        
        if($model->verifie_connect()){
            return include 'app/views/admin/historique.php';
        }
        else{
            return header("Location: index.php?action=loginForm");
        }
    }

}
