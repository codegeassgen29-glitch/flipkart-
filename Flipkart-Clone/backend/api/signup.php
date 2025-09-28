<?php
include_once '../config/db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->password) && isset($data->email)) {
    $username = $data->username;
    $password = password_hash($data->password, PASSWORD_BCRYPT);
    $email = $data->email;

    $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo json_encode(["message" => "User registered successfully."]);
    } else {
        echo json_encode(["message" => "User registration failed.", "error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid input."]);
}

$conn->close();
?>