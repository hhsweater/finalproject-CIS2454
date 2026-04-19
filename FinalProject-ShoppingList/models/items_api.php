<?php
header("Content-Type: application/json");
require 'database.php';
require 'items.php';
$method = $_SERVER['REQUEST_METHOD'];
$json = file_get_contents('php://input');
$input = json_decode($json);

//echo $input->store_id;
//echo $input->name;
//echo $input->store_id;
//echo $input->quantity;
 //$items_ref = new Items($input->id, $input->store_id, $input->name, $input->quantity, $input->checked);

switch ($method) {
    case 'GET':
        $items = new Items($id, $store_id, $name, $quantity, $checked);
        $items->list_items();
        
        break;
    case 'GET':
        $items_ref = new Items($id, $store_id, $name, $quantity, $checked);
        get_items($input);
        break;
    case 'POST':
        $items_ref = new Items($input->id, $input->store_id, $input->name, $input->quantity, $input->checked);
        //insert_items($input->store_id, $input->name, $input->quantity, $input->checked);
        insert_items($items_ref);
        break;
    case 'PUT':
        $items_ref = new Items($id, $store_id, $name, $quantity, $checked);
        update_items($input);
        break;
    case 'DELETE':
        $items_ref = new Items($id, $store_id, $name, $quantity, $checked);
        delete_items($input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}