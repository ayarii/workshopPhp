<?php
class config {
    private static $pdo = null;

    public static function getConnexion() {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = 'crudpersonne';
            $username = 'root';
            $password = '';

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Gestion propre de l'erreur de connexion
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>