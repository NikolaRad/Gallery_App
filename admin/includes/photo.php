<?php

class Photo extends Entity {
    
    protected static $table = "photos";
    protected static $table_fields = array('title','alt_text','description','filename','type','size');
    public $id;
    public $title;
    public $alt_text;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $date;
    
    public $tmp_path;
    public $upload_directory = "images";
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
    
    public function set_file($file) {
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There is no file uploaded here.";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
    
    public function picture_path() {
        return $this->upload_directory . DS . $this->filename;
    }
    
    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available.";
                return false;
            }
            $target_path = SITE_ROOT . DS .  "admin" . DS . $this->upload_directory . DS . $this->filename;
            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->filename} already exists.";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,"C:\wamp64\www\Gallery\admin\images\\" . $this->filename)){
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
    
    public function delete_photo(){
        if($this->delete()){
            $target_path = SITE_ROOT . DS . "admin" . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }
    
    public static function display_sidebar_data($photo_id){
        $photo = Photo::find_by_id($photo_id);
        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}'></a><p>{$photo->filename}</p><p>{$photo->type}</p><p>{$photo->size}</p>";
        echo $output;
    }
    
}

?>