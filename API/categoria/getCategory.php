<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/categoria.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->id)) {
    http_response_code(400);
    echo json_encode(["message" => "Insert a valid ID"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$categoria = new Categoria($conn);
$result = $categoria->getCategory((int)$id);

if ($result->num_rows > 0)
{
    echo json_encode(array($result->fetch_assoc()), JSON_PRETTY_PRINT);
    die();
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>