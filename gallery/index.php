<?php include("admin/includes/header.php"); ?>
<?php include("includes/header.php"); ?>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1 ;
$items_total_count = Photo::count_all();
$items_per_page = 2;

$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photo LIMIT " . $items_per_page ." OFFSET {$paginate->offset()}";
$photos =  Photo::find_this_query($sql); 
?>  

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <div class="thumbnail row">

            <?php  foreach ($photos as $photo): ?>
    
                <div class="col-xs-6 col-md-3">
                    <a href="photo.php?id=<?php echo $photo->id;?>" class="thumbnail">
                <img class="img-responsive home_photo"  src="admin/<?php echo $photo->picture_path();?>" alt="" srcset="">

                    </a>
                </div>
                <?php endforeach; ?>
            </div>
          

          <ul class="pager">
                <?php 
                
                if($paginate->page_total()>1){
                    if($paginate->has_next()){
                        echo "
                        <li class='next'> <a href='index.php?page={$paginate->next()}'>Next</a> </li>
                        ";
                }

                for ($i=1; $i<= $paginate->page_total(); $i++) { 
                    if($i == $paginate->current_page){
                        echo"
                        <li class='active'> <a href='index.php?page={$i}'>{$i}</a> </li>
                        ";
                    }else{
                        echo"
                        <li> <a href='index.php?page={$i}'>{$i}</a> </li>
                        ";  
                    }
                }
                if($paginate->has_prev()){
                 echo "   <li class='previous'> <a href='index.php?page={$paginate->previous()}'>Prev</a> </li>";

                }
            }   
                ?>

          </ul>
         
            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4">-->

            
                 <?php  //include("includes/sidebar.php"); ?>



        </div> 
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
<style>
    .pager  .active a{
    background-color: #000;
    color: white !important;
}
.pager  .active a:hover{
    background-color: #000;
    color: white !important;
}
</style>