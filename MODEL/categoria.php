<?php
class Categoria
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>