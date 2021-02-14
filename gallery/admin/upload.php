<?php include("includes/header.php"); ?>
<?php 
    $the_message = '';
    if(isset($_FILES['file'])){
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->set_file($_FILES['file']);

        if($photo->save())
        $the_message = 'The photo was sucessfully uploaded';
 
    else{
        $the_message = join("<br>", $photo->errors);
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

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Upload
            <small>Subheading</small>
        </h1>
    <?php echo $the_message; ?>
        <div class="col-md-6">
            <form action="upload.php" method="post" class="dropzone" enctype="multipart/form-data">
            <div class="form-group">
            <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="form-group">
            <input type="file" name="file_upload" id="">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        
        </div>
    </div>
</div>
<!-- /.row -->

</div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
