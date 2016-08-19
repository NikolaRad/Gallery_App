<?php require_once "includes/header.php"; ?>
<?php 
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 16;
$items_total_count = Photo::count_all();
$paginate = new Paginate($page,$items_per_page,$items_total_count);
$sql = "SELECT * FROM photos LIMIT {$paginate->offset()},{$items_per_page}";
$photos = Photo::query($sql);
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
               <div class="thumbnail row">
                <?php foreach($photos as $photo){ ?>
                       <div class="col-xs-6 col-md-3">
                           <a class="thumbnail" href="single_photo.php?id=<?php echo $photo->id; ?>">
                               <img style="width:300px;height:200px !important;" class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                           </a>
                       </div>  
                <?php } ?>
                </div>
                <div class="row">
                    <ul class="pager">
                       <?php
                            if($paginate->page_total() > 1){
                                if($paginate->has_next()){
                                  echo "<li class='next'><a href='index.php?page=" . $paginate->next() . "'>Next</a></li>";  
                                }else{
                                  echo "<li class='next disabled'><a href='index.php?page=" . $paginate->next() . "'>Next</a></li>";
                                }
                                for($i=1;$i<=$paginate->page_total();$i++){
                                    if($i == $paginate->current_page){
                                        echo "<li><a style='background-color:gray;color:white;' href='index.php?page=" . $i . "'>{$i}</a></li>";
                                    }else{
                                        echo "<li><a href='index.php?page=" . $i . "'>{$i}</a></li>";
                                    }
                                }
                                if($paginate->has_previous()){
                                    echo "<li class='previous'><a href='index.php?page=" . $paginate->previous() . "'>Previous</a></li>";
                                }else{
                                    echo "<li class='previous disabled'><a href='index.php?page=" . $paginate->previous() . "'>Previous</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<?php //require_once "includes/sidebar.php"; ?>
<!--            </div>-->

        </div>
        <!-- /.row -->

        <hr>
<?php require_once "includes/footer.php"; ?>
