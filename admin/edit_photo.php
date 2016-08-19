<?php require_once "includes/header.php"; ?>
<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?>
<?php
    if(isset($_GET['id'])){
        if(empty($_GET['id'])){
            header("Location: photos.php");
        }else{
            $photo = Photo::find_by_id($_GET['id']);
            if(isset($_POST['update'])){
                if($photo){
                    $photo->title = $_POST['title'];
                    $photo->alt_text = $_POST['alt_text'];
                    $photo->description = $_POST['desc'];
                    
                    $photo->save();
                }
            }
        }
    }else{
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
                        Edit photo
                        <small>Subheading</small>
                    </h1>
                    <form action="" method="post">
                    <div class="col-md-8">
                        <div class="form-group">
                           <label for="caption">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                        </div>
                        
                        <div class="form-group">
                            <a class="thumbnail" href=""><img src="<?php echo $photo->picture_path(); ?>" alt=""></a>
                        </div>
                        
                        <div class="form-group">
                           <label for="caption">Alternate Text</label>
                            <input type="text" name="alt_text" class="form-control" value="<?php echo $photo->alt_text; ?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="caption">Description</label>
                            <textarea class="form-control" name="desc" id="" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                    <div class="photo-info-box">
                        <div class="info-box-header">
                            <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span>Uploaded on: <?php echo $photo->date; ?>
                                </p>
                                <p class="text">
                                    Photo ID: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                </p>
                                <p class="text">
                                    Filename: <span class="data"><?php echo $photo->filename; ?></span>
                                </p>
                                <p class="text">
                                    File Type: <span class="data"><?php echo $photo->type; ?></span>
                                </p>
                                <p class="text">
                                    File Size: <span class="data"><?php echo $photo->size; ?></span>
                                </p>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a onclick="return confirm('Are you sure you want to delete?');" href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger">Delete</a>
                                </div>
                                <div class="info-box-update pull-right">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
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
