<?php
require_once 'config.php';

class modeladmin {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM admins WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }

    public function mise_a_jour_token($token, $email){
        $updateSql = "UPDATE admins SET token = :token WHERE email = :email";
            $updateStmt = $this->db->prepare($updateSql);
            $updateStmt->execute([
                ':token' => $token,
                ':email' => $email
            ]);
            if($updateStmt){
                return $updateStmt;
            }
    }

    public function verifie_connect(){
        
        if (isset($_SESSION['admin_id'])) {
            session_start();
            return true;
        }

        // Si pas de session, vérifier les cookies
        if (!empty($_COOKIE['email']) && !empty($_COOKIE['token'])) {
            $email = $_COOKIE['email'];
            $token = $_COOKIE['token'];

            $sql = "SELECT id FROM admins WHERE email = :email AND token = :token LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':token' => $token
            ]);

            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                // Réinitialiser la session pour prolonger la connexion
                $_SESSION['admin_id'] = $admin['id'];
                return true;
            }
        }

        // Si aucune condition remplie
        return false;
    }
    // public function verifie_connect(){
    //     // Démarrer la session si pas encore démarrée
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     // Si session admin active, accès autorisé
    //     if (isset($_SESSION['admin_id'])) {
    //         return true;
    //     }

    //     // Vérifier les cookies uniquement si session inactive
    //     if (!empty($_COOKIE['email']) && !empty($_COOKIE['token'])) {
    //         $email = $_COOKIE['email'];
    //         $token = $_COOKIE['token'];

    //         $sql = "SELECT id FROM admins WHERE email = :email AND token = :token LIMIT 1";
    //         $stmt = $this->db->prepare($sql);
    //         $stmt->execute([
    //             ':email' => $email,
    //             ':token' => $token
    //         ]);

    //         $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    //         if ($admin) {
    //             // Créer la session pour prolonger la connexion
    //             $_SESSION['admin_id'] = $admin['id'];
    //             return true;
    //         }
    //     }

    //     // Si les cookies sont absents, vides ou invalides : accès refusé
    //     return false;
    // }



    public function add_dep($data){
        $connect = $this->db;
        if (!$connect){
            return false;
        }
        else{
            
            $stmt = $connect->prepare("INSERT INTO departements (nom_dep) VALUES (:nom_dep)");
            $stmt->bindParam(':nom_dep', $data, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt){
                return true;
            }
            
        }
        
    }

    public function add_users($data){
        $connect = $this->db;
        if (!$connect){
            return false;
        }
        else{
            
            $stmt = $connect->prepare(
                "INSERT INTO users (nom_complet, email, poste, droit, departement, heure) 
                VALUES (:nom_complet, :email, :poste, :droit, :departement, :heure)"
            );

            $stmt->execute([
                ':nom_complet' => $data['nom_complet'],
                ':email' => $data['email'],
                ':poste' => $data['poste'],
                ':droit' => $data['droit'],
                ':departement' => $data['departement'],
                ':heure' => $data['heure']
            ]);

            return true;

            
        }
        
    }

    function recuperer_tous($table, $ordre = 'DESC') {
        $con = $this->db;
        if (!$con) return [];

        $stmt = $con->query("SELECT * FROM $table ORDER BY id $ordre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
