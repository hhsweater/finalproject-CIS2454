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


