<?php
header("Content-Type: application/json");
include 'database.php';
require '../models/stores.php';
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        
        list_stores();
        break;
    case 'GET':
        get_stores($input);
        break;
    case 'POST':
        insert_stores($input);
        break;
    case 'PUT':
        update_stores($input);
        break;
    case 'DELETE':
        delete_stores($input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}