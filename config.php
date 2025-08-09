<?php
class Database {
    private static $host = "localhost";
    private static $db_name = "nocibe_db";
    private static $username = "root";
    private static $password = "";
    private static $conn = null;

    // Connexion PDO sécurisée (Singleton)
    public static function connect() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8",
                    self::$username,
                    self::$password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            } catch (PDOException $e) {
                die("Erreur de connexion : " . htmlspecialchars($e->getMessage()));
            }
        }
        return self::$conn;
    }
}
?>

