<?php

header('Content-Type: application/json');  
require '../models/database.php';
$data = json_decode(file_get_contents("php//:input"), true);
if (empty($data['id'])) {
    echo json_encode(["error" => "Empty or nonexistent Id"]);
    exit;
}
$statement = $database->prepare("DELETE FROM items WHERE id = ?");
$statement->bind_param("i", $data['id']);
$statement->execute();
echo json_encode(["message" => "Values deleted from table"]);
$statement->close();
