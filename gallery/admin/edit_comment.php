<?php include("includes/header.php"); ?>


<?php

if(empty($_GET['id'])){
    redirect("comments.php");
}
$comment = Comment::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($comment){
             $comment->author = $_POST['author'];
            $comment->body = trim($_POST['body']);
            $comment->last_name = $_POST['last_name'];
            $comment->save(); 
            redirect("edit_comment.php?id={$comment->id}");
          }

    }
    // $comment = comment::find_by_id(($_GET['id']));
    // if(isset($_POST['update'])){
    //     if($comment){
    //  $comment->title =   $_POST['title'];
    //  $comment->caption =   $_POST['caption'];
    //  $comment->alternate_text =   $_POST['alternate_text']; 
    //  $comment->description =   $_POST['description'];

    //     $comment->save();
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
            comments
            <small>Subheading</small>
        </h1>
                <div class="col-md-4">

              </div>
                    <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="">Author</label>
                      <input type="text" name="author" id="" class="form-control"  aria-describedby="helpId"  value="<?php echo $comment->author ?>">
                    </div>
         
                    <div class="form-group">
                      <textarea name="body" class="form-control" id="" cols="30" rows="10"><?php echo $comment->body ?> 
                      </textarea>
                    </div>
                    <input type="submit" value="update" name="update" class="btn btn-info pull-right" >
                    </form>    
    </div>
</div>
<!-- /.row -->

</div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
