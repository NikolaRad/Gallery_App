<?php require_once "includes/header.php"; ?>
<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?> 
<?php
    $message = "";
    if(isset($_FILES['file'])){
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->description = $_POST['desc'];
        $photo->alt_text = $_POST['alt_text'];
        $photo->set_file($_FILES['file']);
        if($photo->save()){
            $message = "Photo uploaded successfuly.";
        }else{
            $message = join("<br>", $photo->errors);
        }
    }
?>
    <div id="wrapper">

        <!-- Navigation -->
<?php require_once "includes/navigation.php"; ?>
       
        <div id="page-wrapper">
        <p class="bg-info text-center"><?php echo $message; ?></p>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                        <small>Subheading</small>
                    </h1>
                    <div class="row">
                        <div class="col-md-6">
                           <form action="" method="post" enctype="multipart/form-data" class="">
                               <div class="form-group">
                                  <label for="">Title</label>
                                   <input type="text" name="title" class="form-control">
                               </div>
                               <div class="form-group">
                                  <label for="">Description</label>
                                   <input type="text" name="desc" class="form-control">
                               </div>
                               <div class="form-group">
                                  <label for="">Alternative Text</label>
                                   <input type="text" name="alt_text" class="form-control">
                               </div>
                               <div class="form-group">
                                   <input type="file" name="file">
                               </div>
                               <input class="btn btn-primary" type="submit" name="submit" value="Upload photo">
                           </form>
                        </div>
                   </div><br>
                   <div class="row">
                       <div class="col-lg-12">
                           <form action="upload.php" class="dropzone">
                               
                           </form>
                       </div>
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
