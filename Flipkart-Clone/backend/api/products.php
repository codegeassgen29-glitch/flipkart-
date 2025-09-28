<?php
header('Content-Type: application/json');

include_once '../config/db.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM products";
$stmt = $db->prepare($query);
$stmt->execute();

$products = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[] = $row;
}

echo json_encode($products);
?>