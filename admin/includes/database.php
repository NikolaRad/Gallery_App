<?php

class Database {
    public $connection;
    
    public function __construct(){
        $this->connection();
    }
    public function connection(){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(!$this->connection){
            die("Connection failed. " . mysqli_error($this->connection));
        }    
    }
    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }
    private function confirm_query($result){
       if(!$result){
            die("Query failed. " . mysqli_error($this->connection));
        } 
    }
    public function escape_string($string){
       $escaped_string =  mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }
    public function last_inserted_id(){
        return mysqli_insert_id($this->connection);
    }
}
$database = new Database();

?>