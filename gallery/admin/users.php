<?php include("includes/header.php"); ?>

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
            Users
        </h1>
                    <div class="col-md-12">
                <a href="add_user.php" class="btn btn-primary"> Add User</a>
                <h3> <?php echo $message; ?></h3>
                    <table class="table table-hover">
                        <th>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First name</th>
                                <th>Last name</th>
                            </tr>
                        </th>
                        <tbody>
                        <?php
                            foreach($users as $user){

                                echo "<tr>
                                <td> ".$user->id ." </td>
                                <td> <img src='".$user->image_path_and_placeholder() ."' width= '100' height='50'>        
                                </td>
                                <td> ". $user->username  . "
                                <div class='action_link'>
                                <a href='delete_user.php?id=" . $user->id ." '>Delete</a>
                                <a href='edit_user.php?id=" . $user->id ." '>Edit</a>
                                </div>
                                </td>
                                <td> ". $user->first_name  . "</td>
                                <td> ". $user->last_name  . "</td>
                                </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                    
                    </div>
    </div>
</div>
<!-- /.row -->

</div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
