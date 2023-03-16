<?php
class Ordine
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>