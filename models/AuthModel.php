<?php
namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function register($password, $email, $nom, $prenom)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users ( password, email, nom, prenom) VALUES ( :password, :email, :nom, :prenom)";
        $stmt = self::getPdo()->prepare($sql);
        $stmt->execute([
            ':password' => $password,
            ':email' => $email,
            ':nom' => $nom,
            ':prenom' => $prenom,
        ]);
        return $stmt->rowCount() > 0;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function isLogged()
    {
        return isset($_SESSION['user']);
    }

    public static function getUser($password, $email)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = self::getPdo()->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            return $user;
        } else {
            return [];
        }
    }
}