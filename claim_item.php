<?php
// claim_item.php
header('Content-Type: application/json');
require 'connect.php';

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if item ID is provided
if (isset($data['id'])) {
    $id = $data['id'];
    $stmt = $pdo->prepare("UPDATE items SET claimed = 1 WHERE id = ?");
    
    if ($stmt->execute([$id])) {
         echo json_encode(["success" => true, "message" => "Item marked as claimed"]);
    } else {
         echo json_encode(["success" => false, "message" => "Failed to update item"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Item ID missing"]);
}
?>
