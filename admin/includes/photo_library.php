<?php require_once "init.php"; ?>
<?php 
    $photos = Photo::find_all();
?>
<!-- Photo library -->    
      <div class="modal fade" id="photo-library">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Galery System Library</h4>
                  </div>
                  <div class="modal-body">
                      <div class="col-md-9">
                          <div class="thumbnails row">
                              
                              <!-- PHP CODE -->
                              <?php 
                                foreach($photos as $photo){
                              ?>
                              <div class="col-xs-2">
                                  <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                                      <img class="modal_thumbnail img-responsive" src="<?php echo $photo->picture_path(); ?>" data="<?php echo $photo->id; ?>" alt="">
                                  </a>
                                  <div class="photo-id hidden"></div>
                              </div>
                              <?php } ?>
                              <!-- PHP CODE -->
                              
                              
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div id="modal-sidebar"></div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <div class="row">
                          <button id="set_user_image" type="button" class="btn btn-primary disabled">Apply Selection</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<!-- End Photo library -->