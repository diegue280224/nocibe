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
                session_start();
                header("Location: index.php?action=loginForm");
                exit();
            }
            else{
                $erreur = "Connexion expirée";
                include 'app/views/admin/dashboard_admin.php';
            }
        }
    }

}
