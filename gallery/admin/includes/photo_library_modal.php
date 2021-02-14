<?php require('init.php'); ?>
<?php 

$photos = Photo::find_all();
if(isset($_GET['id'])){
  $user_id = $_GET['id'];
};

?>
<div class="modal fade" id="photo-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-9">
             <div class="thumbnails row">
            
                <!-- PHP LOOP HERE CODE HERE-->
                <?php  foreach($photos as $photo):  ?>                
               <div class="col-xs-2 user_img_box"  >
                 <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                   <img  class="modal_thumbnails img-responsive" src="<?php echo $photo->picture_path(); ?>" data="<?php echo $photo->id; ?>" onclick="photoSelected('<?php echo $photo->picture_path(); ?>', <?php echo $photo->id; ?>, <?php echo $user_id; ?> )">
                 </a>
                  <div class="photo-id hidden"></div>
               </div>
                <?php  endforeach; ?>
                    <!-- PHP LOOP HERE CODE HERE-->

             </div>
          </div><!--col-md-9 -->

  <div class="col-md-3">
    <div id="modal_sidebar"></div>
  </div>

   </div><!--Modal Body-->
      <div class="modal-footer">
        <div class="row">
               <!--Closes Modal-->
              <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  function photoSelected (photo, id, user_id){
    var me = photo.split("-");
    var new_photo = me[me.length - 1];
    // image_src_spilted = image_src.split("/");
// image_name = image_src_spilted[image_src_spilted.length -1];
    var real_photo = "images-" + new_photo;
    $.ajax({
        url: "includes/ajax_code.php",
        data: {photo_id: id},
        type: "POST",
        success:function(data){
            if(!data.error){
                $('#modal_sidebar').html(data);
        }
    }
    
    })
    $("#set_user_image").click(()=>{
    $.ajax({
        url: "includes/ajax_code.php",
        data: {photo: real_photo, user_id:user_id},
        type: "POST",
        success:function(data){
            if(!data.error){
            $('.user_image_box a img').attr("src" , data)
            window.location.reload();
            }
        },

    })

});
  }
</script>