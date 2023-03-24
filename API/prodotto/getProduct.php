<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/prodotto.php';

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id']))
{
    echo json_encode(array("Message" => "No id passed"));
    die();
}

$db = new Database();
$conn = $db->connect();
$prodotto = new Prodotto($conn);
$result = $prodotto->getProduct($id);

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
