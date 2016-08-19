<?php

class Comment extends Entity {
    protected static $table = "comments";
    protected static $table_fields = array('photo_id','author','content');
    public $id;
    public $photo_id;
    public $author;
    public $content;
    public $date;
    
    public static function create_comment($photo_id,$author,$content) {
        if(!empty($photo_id) && !empty($author) && !empty($content)){
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->content = $content;
            return $comment;
        }else{
            return false;
        }
    }
    
    public static function find_comments($photo_id) {
        global $database;
        $query = "SELECT * FROM " . self::$table . " WHERE photo_id = {$database->escape_string($photo_id)} ORDER BY id DESC";
        return self::query($query);
    }
}

?>