<?php

include '../models/database.php';
$sql = "SELECT * FROM stores";
$result = $database->query($sql);
$data = [];
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
header('Content-Type: application/json'); 
echo json_encode($data); 
