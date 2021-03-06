$(document).ready(function(){
    var user_href;
    var user_href_splitted;
    var user_id;
    var image_src;
    var image_src_splitted;
    var image_name;
    var image_id;
    
    $('.modal_thumbnail').click(function(){
        $('#set_user_image').removeClass('disabled');
        user_href = $('#user-id').attr('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[1];
        
        image_src = $(this).attr('src');
        image_src_splitted = image_src.split("\\");
        image_name = image_src_splitted[1];
        
        image_id = $(this).attr('data');
        $.ajax({
            url:"includes/ajax_code.php",
            data:{image_id:image_id},
            type:"POST",
            success:function(data){
                if(!data.error){
                    $('#modal-sidebar').html(data);
                }
            }
        });
    });
    
    $('#set_user_image').click(function(){
        $.ajax({
            url:"includes/ajax_code.php",
            data:{image_name:image_name,user_id:user_id},
            type:"POST",
            success:function(data){
                if(!data.error){
                    $('.user_image_box a img').attr('src',data);
                    location.reload(true);
                }
            }
        });
    });
    
    $('.info-box-header').click(function(){
        $('.box-inner').slideToggle('slow');
        $('#toggle').toggleClass('glyphicon-menu-down glyphicon, glyphicon-menu-up glyphicon');
    });
    
    tinymce.init({ selector:'textarea' });
});
