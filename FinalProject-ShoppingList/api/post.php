<?php

header('Content-Type: application/json');  
require '../models/database.php';
$data = json_decode(file_get_contents("php//:input"), true);
if (empty($data['id']) || empty($data['store_id']) || empty($data['name']) || empty($data['quantity']) || empty($data['checked'])) {
    echo json_encode(["error" => "Input must not be empty"]);
    exit;
}
$statement = $database->prepare("INSERT INTO items (id, store_id, name, quantity, checked) VALUES (?,?,?,?,?)");
$statement->bind_param("sd", $data['id'], $data['store_id'], $data['name'], $data['quantity'], $data['checked']);
$statement->execute();
echo json_encode(["message" => "Values added to table"]);
$statement->close();


