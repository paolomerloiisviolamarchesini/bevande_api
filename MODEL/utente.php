<?php
class Utente
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>