<?php
header('Content-Type: application/json');
include_once '../config/db.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        if (!empty($_GET["user_id"])) {
            $user_id = intval($_GET["user_id"]);
            getCartItems($user_id);
        } else {
            echo json_encode(["message" => "User ID is required."]);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->user_id) && !empty($data->product_id) && !empty($data->quantity)) {
            addCartItem($data->user_id, $data->product_id, $data->quantity);
        } else {
            echo json_encode(["message" => "User ID, Product ID, and Quantity are required."]);
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->user_id) && !empty($data->product_id)) {
            removeCartItem($data->user_id, $data->product_id);
        } else {
            echo json_encode(["message" => "User ID and Product ID are required."]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method."]);
        break;
}

function getCartItems($user_id) {
    global $db;
    $query = "SELECT * FROM cart WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cart_items);
}

function addCartItem($user_id, $product_id, $quantity) {
    global $db;
    $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Item added to cart."]);
    } else {
        echo json_encode(["message" => "Failed to add item to cart."]);
    }
}

function removeCartItem($user_id, $product_id) {
    global $db;
    $query = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Item removed from cart."]);
    } else {
        echo json_encode(["message" => "Failed to remove item from cart."]);
    }
}
?>