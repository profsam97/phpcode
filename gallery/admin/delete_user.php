<?php include("includes/init.php");

 if(!$session->is_signed_in()) { redirect("login.php"); };
?>

       <?php 
    echo "It works";

    if(empty($_GET['id'])){
        redirect("users.php");
    };

    $user = user::find_by_id($_GET['id']);

    if($user){
        $session->message("The user {$user->username} has been deleted");
        $user->delete_photo();
        redirect ("users.php");

    }
    else{
        redirect ("users.php");
    }
?>