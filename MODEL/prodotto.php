<?php
class Prodotto
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function addProduct($nome,$descrizione,$prezzo,$categoria,$quantita,$active)
    {
        $sql = "INSERT INTO product (nome, descrizione, prezzo, categoria, quantita, active)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssdiib', $nome, $descrizione, $prezzo, $categoria,$quantita,$active);

    if ($stmt->execute())
    return $stmt;
    else return "";
    }

    public function getArchiveProducts(){
        $sql=sprintf("SELECT * FROM prodotto WHERE 1=1");
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>