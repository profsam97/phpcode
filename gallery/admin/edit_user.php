<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>


<?php
if(empty($_GET['id'])){
    redirect("users.php");
}
$user = User::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($user){
             $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->last_name = $_POST['last_name'];
            $user->first_name = $_POST['first_name'];
          if(empty($_FILES['user_image'])){
            $user->set_file($user->user_image);
            $session->message("This user has been updated");
          $user->save();
          redirect("users.php?");
          }
          else{
            $user->set_file($_FILES['user_image']);
            $user->upload_image(); 
            $session->message("This user has been updated");
            $user->save(); 
            redirect("users.php?");
          }
        }

    }
    // $user = user::find_by_id(($_GET['id']));
    // if(isset($_POST['update'])){
    //     if($user){
    //  $user->title =   $_POST['title'];
    //  $user->caption =   $_POST['caption'];
    //  $user->alternate_text =   $_POST['alternate_text']; 
    //  $user->description =   $_POST['description'];

    //     $user->save();
    // }
    // }

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

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            users
            <small>Subheading</small>
        </h1>
                <div class="col-md-4 user_image_box">
             <a href="#" data-toggle="modal" data-target="#photo-modal">   
               <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" srcset=""></a>

              </div>
                    <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                      <input type="text" name="username" id="" class="form-control"   value="<?php echo $user->username ?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                      <input type="file" name="user_image"  id="" class="form-control"  aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                      <label for="">First name</label>
                      <input type="text" name="first_name" id="" class="form-control"  aria-describedby="helpId"  value="<?php echo $user->first_name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Last name</label>
                      <input type="text" name="last_name" id="" class="form-control"  aria-describedby="helpId"  value="<?php echo $user->last_name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <a id="user_id" href="delete_user.php?id=<?php echo $user->id?>" class="btn btn-danger">Delete </a>
                    <input type="submit" value="update" name="update" class="btn btn-info pull-right" >
                    </form>    
    </div>
</div>
<!-- /.row -->

</div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
