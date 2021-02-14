<?php include("includes/header.php"); ?>


<?php

if(empty($_GET['id'])){
    redirect("index.php");
}else{
    $photo = Photo::find_by_id(($_GET['id']));
    if(isset($_POST['update'])){
        if($photo){
     $photo->title =   $_POST['title'];
     $photo->caption =   $_POST['caption'];
     $photo->alternate_text =   $_POST['alternate_text']; 
     $photo->description =   $_POST['description'];

        $photo->save();
    }
}

}


?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
          <?php include("includes/top_nav.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("includes/sidebar.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <!-- container-fluid -->

            <div class="container-fluid">
            <?php
            // $result_set = User::find_all_users();
            // while ($row =mysqli_fetch_array($result_set)) {
            //     echo $row['username'] . "<br>";
            // }

            // $check_user_id = User::find_user_by_id(3);
            // $echo = User::instantiation($check_user_id);
            // echo $echo->username;
                // $photos = new Photo ();
                $photos = photo::find_all();
                // $photos->title = 'sdfs';
                // $photos->filename = 'sdfs';
                // $photos->type = 'sdfs';
                // $photos->size = 11;
                // $photos->description = 'sdfs';
                // $photos->();
     
        ?>
        
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Photos
            <small>Subheading</small>
        </h1>
                    <div class="col-md-8">
                    <form action="" method="post">
                    
                    <div class="form-group">
                      <input type="text" name="title" id="" class="form-control" value="<?php echo $photo->title; ?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <a href="" class="thumbnail" ><img src="<?php echo $photo->picture_path();?>" alt=""></a>
                    </div>
                    <div class="form-group">
                      <label for="">Caption</label>
                      <input type="text" name="caption" id="" class="form-control" value="<?php echo $photo->caption; ?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Alternate Text</label>
                      <input type="text" name="alternate_text" id="" class="form-control" value="<?php echo $photo->alternate_text; ?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                    </div>                
                    </div>

                    <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box">34</span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data">JPG</span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data">3245345</span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
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
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
<script>

$(".info-box-header").click(()=>{
$(".inside").slideToggle("fast");
$("#toggle").toggleClass("glyphicon-menu-up glyphicon")
});
</script>