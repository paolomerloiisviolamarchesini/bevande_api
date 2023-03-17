<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/prodotto.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

$db = new Database();
$conn = $db->connect();
$prodotto = new Prodotto($conn);
$result = $prodotto->getArchiveProducts();

if ($result != false) {
    $prodotti = array();
    while ($row = $result->fetch_assoc())
    {
        $prodotti[] = $row;
    }
    echo json_encode($prodotti, JSON_PRETTY_PRINT);
} else {
    http_response_code(400);
    echo json_encode(["message" => "Product not found"]);
}
?>