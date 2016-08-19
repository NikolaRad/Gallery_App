<?php
require_once "admin/includes/init.php";

if(empty($_GET['id'])){
    header("Location: index.php");
}

$photo = Photo::find_by_id($_GET['id']);

    if(isset($_POST['submit'])){
        $author = trim($_POST['author']);
        $content = trim($_POST['content']);
        $comment = Comment::create_comment($photo->id,$author,$content);
        if($comment && $comment->save()){ 
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }else{
            $message = "There was some promlems during saving.";
        }
    }else{
        $author = "";
        $content = "";
    }
    $comments = Comment::find_comments($photo->id);
?>
<?php require_once "includes/header.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $photo->date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img width="100%" class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->alt_text; ?>">

                <hr>

                <!-- Post Content -->
                <p class="lead text-justify"><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       <div class="form-group">
                          <label for="">Author:</label>
                           <input type="text" name="author" class="form-control">
                       </div>
                        <div class="form-group">
                           <label for="">Comment:</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                    foreach($comments as $comment){
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small><?php echo $comment->date; ?></small>
                        </h4>
                        <?php echo $comment->content; ?>
                    </div>
                </div>
                <?php } ?>

            </div>
<!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<?php //require_once "includes/sidebar.php"; ?>
<!--            </div>-->

        </div>
        <!-- /.row -->

        <hr>
<?php require_once "includes/footer.php"; ?>