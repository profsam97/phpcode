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
        </h1>
        <h4><?php echo $message; ?></h4>
                    <div class="col-md-12">
                    
                    <table class="table table-hover">
                        <th>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Count</th>
                            </tr>
                        </th>
                        <tbody>
                        <?php
                            foreach($photos as $photo){
                                echo "<tr>
    
                                <td> <img src='".$photo->picture_path() ."' width= '100' height='50'> 
                                <div class='pictures_link'>
                                <a href='delete_photo.php?id=" . $photo->id ." ' class='delete_link'>Delete</a>
                                <a href='edit_photo.php?id=" . $photo->id ." '>Eidt</a>
                                <a href='../photo.php?id=" . $photo->id ." '>View</a>
                                </div>
                                </td>
                                <td> ". $photo->id  . "</td>
                                <td> ". $photo->filename  . "</td>
                                <td> ". $photo->title  . "</td>
                                <td> ". $photo->size  . "</td> "?>
                                <td><a href='comment_photo.php?id=<?php echo $photo->id ?>'>
                                <?php
                                $comments = Comment::find_the_comments($photo->id);
                                ?>
                              <?php  echo count($comments)  ?> </a></td><?php echo  "

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
<script>
$(".delete_link").click(()=>{
    return confirm("Are you sure you want to delete this photo");
});
</script>