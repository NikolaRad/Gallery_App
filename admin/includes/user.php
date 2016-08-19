<?php

class User extends Entity {
    protected static $table = "users";
    protected static $table_fields = array('first_name','last_name','username','password','image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $image;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/100x100&text=image";
    
    public $tmp_path;
    public $upload_errors_array = array(
        UPLOAD_ERR_OK         => "There is no error, the file uploaded with success.",
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0.",
        UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload."
    );
    public $errors = array();
    
    public static function verify_user($username,$password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        
        $sql = "SELECT * FROM " . self::$table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        $result = self::query($sql);
        return !empty($result) ? array_shift($result) : false;
    }
    
    public function image_path() {
        return empty($this->image) ? $this->image_placeholder : $this->upload_directory . DS . $this->image;
    }
    
     public function set_file($file) {
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There is no file uploaded here.";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
    
    public function save_all(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->image) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available.";
                return false;
            }
            $target_path = SITE_ROOT . DS .  "admin" . DS . $this->upload_directory . DS . $this->image;
            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->image} already exists.";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,"C:\wamp64\www\Gallery\admin\images\\" . $this->image)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[] = "The file directory probably doesn't have a permission.";
                return false;
            }
        }
    }
    
    public function delete_user(){
        if($this->delete()){
            $target_path = SITE_ROOT . DS . "admin" . DS . "images" . DS . $this->image;
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }
    
    public function ajax_save_user_image($user_image, $user_id){
        global $database;
        $user_image = $database->escape_string($user_image);
        $user_id = $database->escape_string($user_id);
        $this->image = $user_image;
        $this->id = $user_id;
        $sql = "UPDATE " . self::$table . " SET image = '{$this->image}' WHERE id = {$this->id}";
        $update_image = $database->query($sql);
        echo $this->image_path();
    }

}

?>