<?php include("includes/header.php"); ?>


<?php

    $user = new User();

    if(isset($_POST['submit'])){
        if($user){
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->last_name = $_POST['last_name'];
            $user->first_name = $_POST['first_name'];

            $user->set_file($_FILES['file_upload']);
            $user->upload_image();
            $session->message("The user {$user->username} has been created");
            $user->save();
            redirect("users.php");
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
            <?php
            // $result_set = User::find_all_users();
            // while ($row =mysqli_fetch_array($result_set)) {
            //     echo $row['username'] . "<br>";
            // }

            // $check_user_id = User::find_user_by_id(3);
            // $echo = User::instantiation($check_user_id);
            // echo $echo->username;
                // $users = new user ();
                $users = user::find_all();
                // $users->title = 'sdfs';
                // $users->filename = 'sdfs';
                // $users->type = 'sdfs';
                // $users->size = 11;
                // $users->description = 'sdfs';
                // $users->();
     
        ?>
        
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            users
            <small>Subheading</small>
        </h1>
                    <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                      <input type="text" name="username" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="username">Profile Picture</label>
                      <input type="file" name="file_upload" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">First name</label>
                      <input type="text" name="first_name" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Last name</label>
                      <input type="text" name="last_name" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" id="" class="form-control"  aria-describedby="helpId">
                    </div>
                    <input type="submit" value="submit" name="submit" class="btn btn-success" >
                    </form>    
    </div>
</div>
<!-- /.row -->

</div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
