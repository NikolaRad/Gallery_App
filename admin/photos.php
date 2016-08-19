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
                        Photos
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>ID</th>
                                    <th>Filename</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                                    $items_per_page = 5;
                                    $items_total_count = Photo::count_all();
                                    $paginate = new Paginate($page,$items_per_page,$items_total_count);
                                    $sql = "SELECT * FROM photos LIMIT {$paginate->offset()},{$items_per_page}";
                                    $photos = Photo::query($sql);
                                    foreach($photos as $p){
                                ?>
                                <tr>
                                    <td><img width="300" src="<?php echo $p->picture_path(); ?>" alt="">
                                    <div class="pictures_link">
                                        <a onclick="return confirm('Are you sure you want to delete?');" href="delete_photo.php?id=<?php echo $p->id; ?>">Delete</a>
                                        <a href="edit_photo.php?id=<?php echo $p->id; ?>">Edit</a>
                                        <a href="../single_photo.php?id=<?php echo $p->id; ?>">View</a>
                                    </div>
                                    </td>
                                    <td><?php echo $p->id; ?></td>
                                    <td><?php echo $p->filename; ?></td>
                                    <td><?php echo $p->title; ?></td>
                                    <td><?php echo $p->size; ?></td>
                                    <td>
                                    <?php
                                        $comments = Comment::find_comments($p->id);  
                                    ?>
                                    <a href="photo_comments.php?id=<?php echo $p->id; ?>"><?php echo count($comments); ?></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                    <ul class="pagination">
                       <?php
                            if($paginate->page_total() > 1){
                                if($paginate->has_previous()){
                                    echo "<li class='previous'><a href='photos.php?page=" . $paginate->previous() . "'>Previous</a></li>";
                                }else{
                                    echo "<li class='previous disabled'><a href='photos.php?page=" . $paginate->previous() . "'>Previous</a></li>";
                                }
                                for($i=1;$i<=$paginate->page_total();$i++){
                                    if($i == $paginate->current_page){
                                        echo "<li><a style='background-color:gray;color:white;' href='photos.php?page=" . $i . "'>{$i}</a></li>";
                                    }else{
                                        echo "<li><a href='photos.php?page=" . $i . "'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_next()){
                                  echo "<li class='next'><a href='photos.php?page=" . $paginate->next() . "'>Next</a></li>";  
                                }else{
                                  echo "<li class='next disabled'><a href='photos.php?page=" . $paginate->next() . "'>Next</a></li>";
                                }
                                
                            }
                        ?>
                    </ul>
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
