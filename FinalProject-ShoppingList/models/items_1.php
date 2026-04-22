<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header("Content-Type: application/json");
include 'database.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($database);
        break;
    case 'POST':
        handlePost($database, $input);
        break;
    case 'PUT':
        handlePut($database, $input);
        break;
    case 'DELETE':
        handleDelete($database, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handleGet($database) {
    
    $sql = "SELECT * FROM items";
    $statement = $database->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function handlePost($database, $input) {
    $sql = "INSERT INTO items (store_id, name, quantity, checked) VALUES (:store_id, :name, :quantity, :checked)";
    $statement = $database->prepare($sql);
    $statement->execute(['name' => $input['name'], 'quantity' => $input['quantity'], 'store_id' => $input['store_id'], 'checked' => $input['checked']]);
    echo json_encode(['message' => 'Product created successfully']);
}

function handlePut($database, $input) {
    $sql = "UPDATE items SET store_id = :store_id, name = :name, quantity = :quantity, checked = :checked WHERE id = :id";
    $statement = $database->prepare($sql);
    $statement->execute(['id' => $input['id'], 'name' => $input['name'], 'quantity' => $input['quantity'], 'store_id' => $input['store_id'], 'checked' => $input['checked']]);
    echo json_encode(['message' => 'Product updated successfully']);
}

function handleDelete($database, $input) {
    $sql = "DELETE FROM items WHERE id = :id";
    $statement = $database->prepare($sql);
    $statement->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'Product deleted successfully']);
}
?>