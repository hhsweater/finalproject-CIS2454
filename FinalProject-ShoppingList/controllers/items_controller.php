<?php
require '../models/database.php';
class ItemController {
    private $database;
    private $item;
    
    public function __construct() {
        $this->database = $database;
        $this->item = new $item($database);
    }
    
    
}

