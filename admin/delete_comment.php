<?php require_once "includes/init.php"; ?>

<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}

if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }else{
        $comment = Comment::find_by_id($_GET['id']);
        if($comment){
            $comment->delete();
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }else{
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}

?>  