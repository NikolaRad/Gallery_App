<?php require_once "includes/init.php"; ?>

<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}

if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header("Location: users.php");
    }else{
        $user = User::find_by_id($_GET['id']);
        if($user){
            $user->delete_user();
            header("Location: users.php");
        }else{
            header("Location: users.php");
        }
    }
}

?>  