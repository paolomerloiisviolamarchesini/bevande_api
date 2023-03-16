<?php
class Valori_Nutrizionali
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>