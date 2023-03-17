<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/prodotto.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

$db = new Database();
$conn = $db->connect();
$valore_nutrizionale = new Valori_Nutrizionali($conn);
$result = $valore_nutrizionale->getArchiveProducts();

if ($result != false) {
    $valore_nutrizionale = array();
    while ($row = $result->fetch_assoc())
    {
        $valore_nutrizionale[] = $row;
    }
    echo json_encode($valore_nutrizionale, JSON_PRETTY_PRINT);
} else {
    http_response_code(400);
    echo json_encode(["message" => "Valore nutrizionale not found"]);
}
?>
