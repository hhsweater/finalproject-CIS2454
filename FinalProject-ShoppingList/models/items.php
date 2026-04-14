<?php

class items {
    
    private $id, $store_id, $name, $quantity, $checked;
    
    public function __construct($id, $store_id, $name, $quantity, $checked) {
        
        $this->set_id($id);
        $this->set_store_id($store_id);        
        $this->set_name($name);
        $this->set_quantity($quantity);
        $this->set_checked($checked);        
    }
    ///getters and setters
    public function set_id($id) {
        $this->id = $id;
    }
    
    public function get_id() {
        return $this->id;
    }
    
    public function set_store_id($store_id) {
        $this->id = $store_id;
    }
    
    public function get_store_id() {
        return $this->store_id;
    }
    
    public function set_name($name) {
        $this->name = $name;
    }
    
    public function get_name() {
        return $this->name;
    }
    
    public function set_quantity($quantity) {
        $this->quantity = $quantity;
    }
    
    public function get_quantity() {
        return $this->quantity;
    }
    
    public function set_checked($checked) {
        $this->checked = $checked;
    }
    
    public function get_checked() {
        return $this->checked;
    }
    ///end getters and setters
}

function get_items($id) {
    global $database;
    $query = 'SELECT id, store_id, name, quantity, checked FROM items WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $items = $statement->fetch();
    $statement->closeCursor();
    return new items($items['id'],$items['store_id'],$items['name'],$items['quantity'],$items['checked']);
}

function list_items() {
    global $database;
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

function insert_items($items){
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

function update_items($items) {
    global $database;
    $query = "UPDATE items SET id = :id, store_id = :store_id, name = :name, quantity = :quantity, checked = :checked";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $items->get_id());
    $statement->bindValue(":store_id", $items->get_store_id());
    $statement->bindValue(":name", $items->get_name());
    $statement->bindValue(":quantity", $items->get_quantity());
    $statement->bindValue(":checked", $items->get_checked());
    $statement->execute();
    $statement->closeCursor();  
}

function delete_items($items) {
    global $database;
    $query = "DELETE FROM items WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $items->get_id());
    $statement->execute();
    $statement->closeCursor();
}