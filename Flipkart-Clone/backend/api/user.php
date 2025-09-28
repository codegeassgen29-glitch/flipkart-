<?php
include_once '../config/db.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUserProfile($userId) {
        $query = "SELECT id, username, email FROM users WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserProfile($userId, $username, $email) {
        $query = "UPDATE users SET username = :username, email = :email WHERE id = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':userId', $userId);
        return $stmt->execute();
    }
}

header("Content-Type: application/json");
$requestMethod = $_SERVER["REQUEST_METHOD"];
$user = new User();

switch ($requestMethod) {
    case 'GET':
        if (isset($_GET['userId'])) {
            $userId = $_GET['userId'];
            $profile = $user->getUserProfile($userId);
            echo json_encode($profile);
        } else {
            echo json_encode(["message" => "User ID is required."]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->userId) && isset($data->username) && isset($data->email)) {
            $updated = $user->updateUserProfile($data->userId, $data->username, $data->email);
            echo json_encode(["message" => $updated ? "Profile updated successfully." : "Failed to update profile."]);
        } else {
            echo json_encode(["message" => "User ID, username, and email are required."]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method."]);
        break;
}
?>