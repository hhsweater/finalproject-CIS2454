<?php

header('Content-Type: application/json');  
require '../models/database.php';
$data = json_decode(file_get_contents("php//:input"), true);
if (empty($data['id']) || empty($data['store_id']) || empty($data['name'])) {
    echo json_encode(["error" => "Input must not be empty"]);
    exit;
}
$statement = $database->prepare("INSERT INTO stores (id, name) VALUES (?,?)");
$statement->bind_param("sd", $data['id'], $data['name']);
$statement->execute();
echo json_encode(["message" => "Values added to table"]);
$statement->close();