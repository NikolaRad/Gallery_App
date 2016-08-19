<?php require_once "includes/header.php"; ?>
<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?>
    <div id="wrapper">

        <!-- Navigation -->
<?php require_once "includes/navigation.php"; ?>
       
        <div id="page-wrapper">
        
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                        <small>Subheading</small>
                    </h1>
                    <div style="padding-left:15px;">
                    <a href="add_user.php" class="btn btn-primary">Add new user</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $users = User::find_all();
                                    foreach($users as $u){
                                ?>
                                <tr>
                                    <td><?php echo $u->id; ?></td>
                                    <td><img class="user_image" src="<?php echo $u->image_path(); ?>" alt=""></td>
                                    <td><?php echo $u->first_name; ?></td>
                                    <td><?php echo $u->last_name; ?></td>
                                    <td><?php echo $u->username; ?>
                                        <div class="pictures_link">
                                            <a onclick="return confirm('Are you sure you want to delete?');" href="delete_user.php?id=<?php echo $u->id; ?>">Delete</a>
                                            <a href="edit_user.php?id=<?php echo $u->id; ?>">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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
