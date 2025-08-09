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
        $email = $_COOKIE['email'];
        $token = $_COOKIE['token'];
        if(isset($email) || isset($token)){
            return false;
        }
        else{
            $sql = "SELECT * FROM admins WHERE email = :email AND token = :token";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':token' => $token
            ]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$admin) {
                
                if (!isset($_SESSION['admin_id'])) {
                    return false;
                }

            }
            else{
                return true;
            }
        }

        

    }

}
