<?php

class stores {
    
    private $id, $name;
    
    public function __construct($id,$name) {
        
        $this->set_id($id);     
        $this->set_name($name);     
    }
    ///getters and setters
    public function set_id($id) {
        $this->id = $id;
    }
    
    public function get_id() {
        return $this->id;
    }

    public function set_name($name) {
        $this->name = $name;
    }
    
    public function get_name() {
        return $this->name;
    }

    ///end getters and setters
}

function get_stores($id) {
    global $database;
    $query = 'SELECT id, name FROM stores WHERE id = :id';
    $statement = $database->prepare($query);
    $statement-> bindValue(":id", $id);
    $statement->execute();
    $stores = $statement->fetch();
    $statement->closeCursor();
    return new stores($stores['id'], $stores['name']);
}

function list_stores() {
    global $database;
    $query = 'SELECT id, name FROM stores';
    $statement = $database->prepare($query);
    $statement->execute();
    $stores = $statement->fetchAll();
    $statement->closeCursor();
    $stores_array = array();
    foreach ($stores as $stores) {
        $stores_array[] = new stores($stores['id'], $stores['name']);
    }
    return $stores_array;
}

function insert_stores($stores) {
    global $database;
    $query = "INSERT INTO stores (id, name) VALUES (:id, :name)";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $stores->get_id());
    $statement->bindValue(":name", $stores->get_name());
    $statement->execute();
    $statement->closeCursor();
}

function update_stores($stores) {
    global $database;
    $query = "UPDATE stores SET id = :id, name = :name WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $stores->get_id());
    $statement->bindValue(":name", $stores->get_name());
    $statement->execute();
    $statement->closeCursor();
}

function delete_stores($stores) {
    global $database;
    $query = "DELETE FROM stores WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $stores->get_id());
    $statement->execute();
    $statement->closeCursor();
}