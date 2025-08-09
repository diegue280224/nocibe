<?php
require_once 'app/models/model.php';

class Controladmin {
    public function loginForm() {
        $erreur = "";
        include 'app/views/admin/admin_login.php';
    }

    private function login() {
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

    private function dashboard() {
        if (!isset($_SESSION['admin'])) {
            $model = new modeladmin();
            $model->verifie_connect();
            if(!$model){
                $erreur = "Connexion expirée";
                header("Location: index.php?action=loginForm");
                exit();
            }
            else{
                session_start();
                include 'app/views/admin/dashboard_admin.php';
            }
        }
    }

    private function add_dep(){
        $model = new modeladmin();
        $model->verifie_connect();
        if($model){
            if (!empty($_POST['nom_dep']) && isset($_POST['nom_dep'])) {
                $nom_dep = $_POST['nom_dep'];

                $model = new modeladmin();
                $add_dep = $model->add_dep("departements", $nom_dep);

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

    private function add_users(){
        $model = new modeladmin();
        $model->verifie_connect();
        if($model){
            if (!empty(
                $_POST['nom_complet']) && isset($_POST['nom_complet']) && 
                !empty($_POST['email']) && isset($_POST['email']) && 
                !empty($_POST['poste']) && isset($_POST['poste']) &&
                !empty($_POST['departement']) && isset($_POST['departement'])){

                    $donnees = [
                        $nom_complet = $_POST['nom_complet'],
                        $email = $_POST['email'],
                        $poste = $_POST['poste'],
                        $departement = $_POST['departement']
                    ];
                

                    $model = new modeladmin();
                    $add_users = $model->add_dep("departements", $donnees);

                    if($add_users){
                        return include 'app/envoie_mail/sendmail.php';
                    }
                    else{
                        $erreur = "Echec de lors de l'ajout...";
                        return include 'app/views/admin/add_users.php';
                    }
            }
            else{
                return include 'app/views/admin/add_users.php';
            }
        }
        else{
            $erreur = "Connexion expirée";
            header("Location: index.php?action=loginForm");
            exit();
        }
    }


}
