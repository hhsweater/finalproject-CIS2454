<?php
require 'models/database.php';
include 'models/database.php';
require 'index.php';
include 'index.php';
require 'models/items.php';
include 'models/items.php';
if ($requestMethod === "GET") {
    if (isset($_GET['id'])) {
global $database;
    $query = 'SELECT id, store_id, name, quantity, checked FROM items WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $items = $statement->fetch();
    $statement->closeCursor();
    return new items($items['id'],$items['store_id'],$items['name'],$items['quantity'],$items['checked']);
}
} else {
    $query = 'SELECT id, store_id, name, quantity, checked FROM items';
    $statement = $database->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    $items_array = array();
    foreach ($items as $items) {
        $items_array[] = new items($items['id'],$items['store_id'],$items['name'],$items['quantity'],$items['checked']);
    }
    return $items_array;
} 

if ($requestMethod === "POST") {
global $database;
    $query = "INSERT INTO items (id, store_id, name, quantity, checked) VALUES (:id, :store_id, :name, :quantity, :checked)";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $items->get_id());
    $statement->bindValue(":store_id", $items->get_store_id());
    $statement->bindValue(":name", $items->get_name());
    $statement->bindValue(":quantity", $items->get_quantity());
    $statement->bindValue(":checked", $items->get_checked());
    $statement->execute();
    $statement->closeCursor();            
}

if ($requestMethod === "PUT") {
    
    
    
}

