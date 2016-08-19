<?php require_once "includes/header.php"; ?>

<?php
if($session->is_signed_in()){
    header("Location: index.php");
}
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $user_found = User::verify_user($username,$password);
    
    if($user_found){
        $session->login($user_found);
        header("Location: index.php");
    }else{
        $message = "Your username or password are incorrect.";
    }
}else{
    $username = "";
    $password = "";
    $message = "";
}

?>
<div class="col-md-2 col-md-offset-5">
   <h4 class="bg-danger text-center"><?php echo $message; ?></h4>
    <form id="login-form" action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username) ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password) ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<?php require_once "includes/footer.php"; ?>