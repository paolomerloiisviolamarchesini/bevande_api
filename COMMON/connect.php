<?php

class Database
{
    private $dbConnection = null;

    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $db   = "bevande";
        $user = "root";
        $pass = "";

        try {
            $this->dbConnection = new PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function connect()
    {
        return $this->dbConnection;
    }
}
?>

