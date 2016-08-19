<?php

class Entity {
    
    public static function find_all(){
        return static::query("SELECT * FROM " . static::$table . "");
    }

    public static function find_by_id($id){
        $result_array = static::query("SELECT * FROM " . static::$table . " WHERE id = {$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    public static function query($query){
        global $database;
        $result = $database->query($query);
        $object_array = array();
        while($row = mysqli_fetch_assoc($result)){
            $object_array[] = static::assign_values($row);
        }
        return $object_array;
    }
    
    protected static function assign_values($record){
        $class = get_called_class();
        $object = new $class;
        foreach($record as $property => $value){
            if($object->has_property($property)){
                $object->$property = $value;
            }
        }
        return $object;
    }
    
    protected function has_property($property){
        $object_properties = get_object_vars($this);
        return array_key_exists($property, $object_properties);
    }
    
    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }
    
    protected function create(){
        global $database;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$table . "(" . implode(", " ,array_keys($properties)) . ") VALUES ('" . implode("' ,'",array_values($properties)) . "')";
        if($database->query($sql)){
            $this->id = $database->last_inserted_id();
            return true;
        }else{
            return false;
        }
    }
    
    protected function update(){
        global $database;
        $properties = $this->clean_properties();
        $property_pairs = array();
        foreach($properties as $key => $value){
            $property_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . static::$table . " SET " . implode(", ",$property_pairs) . " WHERE id={$this->id}";
        if($database->query($sql)){
            if(mysqli_affected_rows($database->connection) > 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function delete(){
        global $database;
        $sql = "DELETE FROM " . static::$table . " WHERE id={$database->escape_string($this->id)}";
        if($database->query($sql)){
            return true;
        }else{
            return false;
        }
    }
    
    protected function properties(){
        $properties = array();
        foreach(static::$table_fields as $table_field){
            if(property_exists($this,$table_field)){
                $properties[$table_field] = $this->$table_field;
            }
        }
        return $properties;
    }
    
    protected function clean_properties(){
        global $database;
        $clean_properties = array();
        foreach($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }
    
    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$table;
        $result = $database->query($sql);
        $row = mysqli_fetch_array($result);
        return array_shift($row);
    }
    
}

?>