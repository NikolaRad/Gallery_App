<?php require_once "includes/header.php"; ?>
<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?>
<?php
$message = "";
if(isset($_POST['submit'])){
    $user = new User();
    $user->first_name = $database->escape_string($_POST['f_name']);
    $user->last_name = $database->escape_string($_POST['l_name']);
    $user->username = $database->escape_string($_POST['username']);
    $user->password = $database->escape_string($_POST['password']);
    
    $user->set_file($_FILES['photo']);
    if($user->save_all()){
        $message = "User has been successfuly added.";
    }
}
?>
    <div id="wrapper">

        <!-- Navigation -->
<?php require_once "includes/navigation.php"; ?>
       
        <div id="page-wrapper">
        
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
               <p class="bg-info text-center"><?php echo $message; ?></p>
               <p class="bg-danger text-center"><?php if(!empty($user->errors)){ foreach($user->errors as $error) echo $error; } ?></p>
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit photo
                        <small>Subheading</small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                           <label for="f_name">First Name</label>
                            <input type="text" name="f_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label for="l_name">Last Name</label>
                            <input type="text" name="l_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label for="photo">Photo</label>
                            <input type="file" name="photo">
                        </div>
                       <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Add User">
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
       
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php require_once "includes/footer.php"; ?>
