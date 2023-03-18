<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/categoria.php';
header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if (empty($parts[5]->$id)) {
    http_response_code(400);
    echo json_encode(["message" => "Insert a valid ID"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$categoria = new Categoria($conn);
$result = $categoria->getCategory($id);

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