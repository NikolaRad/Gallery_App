<?php require_once "includes/header.php"; ?>
<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
if(empty($_GET['id'])){
    header("Location: photos.php");
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
                        Specific Photo Comments
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo ID</th>
                                    <th>Author</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $comments = Comment::find_comments($_GET['id']);
                                    if(empty($comments)){
                                        header("Location: " . $_SERVER['HTTP_REFERER']);
                                    }
                                    foreach($comments as $c){
                                ?>
                                <tr>
                                    <td><?php echo $c->id; ?></td>
                                    <td><?php echo $c->photo_id; ?></td>
                                    <td><?php echo $c->author; ?></td>
                                    <td><?php echo $c->content; ?></td>
                                    <td><?php echo $c->date; ?></td>
                                    <td><a href="delete_comment.php?id=<?php echo $c->id; ?>">Delete</a></td>
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
