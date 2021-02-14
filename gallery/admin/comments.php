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
            // $result_set = comment::find_all_comments();
            // while ($row =mysqli_fetch_array($result_set)) {
            //     echo $row['commentname'] . "<br>";
            // }

            // $check_comment_id = comment::find_comment_by_id(3);
            // $echo = comment::instantiation($check_comment_id);
            // echo $echo->commentname;
                // $comments = new comment ();
                $comments = comment::find_all();
                // $comments->title = 'sdfs';
                // $comments->filename = 'sdfs';
                // $comments->type = 'sdfs';
                // $comments->size = 11;
                // $comments->description = 'sdfs';
                // $comments->();
     
        ?>
        
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          All Comments
        </h1>
        <h4><?php echo $message; ?></h4>
                    <div class="col-md-12">
                    <table class="table table-hover">
                        <th>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Body</th>
                            </tr>
                        </th>
                        <tbody>
                        <?php
                            foreach($comments as $comment){

                                echo "<tr>
                                <td> ".$comment->id ." </td>
                                <td> ". $comment->author  . "
                                <div class='action_link'>
                                <a href='delete_comment.php?id=" . $comment->id ." '>Delete</a>
                                <a href='edit_comment.php?id=" . $comment->id ." '>Edit</a>
                                </div>
                                </td>
                                <td> ". $comment->body  . "</td>
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
