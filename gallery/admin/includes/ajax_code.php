<?php require('init.php'); ?>

<?php
$user = new User();
if(isset($_POST['photo'])){
    $user->ajax_save_user_image($_POST['photo'], $_POST['user_id']);
}

if(isset($_POST['photo_id'])){
 Photo::dispaly_sidebar_data($_POST['photo_id']);
}

?>