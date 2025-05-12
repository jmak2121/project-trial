<?php
// add_item.php
header('Content-Type: application/json');
require 'connect.php';

// Decode JSON POST input
$data = json_decode(file_get_contents("php://input"), true);

// Check for required fields
if (true) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // Prepare and execute the insert query
    $stmt = $pdo->prepare("INSERT INTO items (name, category, description, location) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $category, $description, $location])) {
        echo json_encode(["success" => true, "message" => "Item added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add item"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Required fields missing"]);
}
?>