<?php
session_start();
include('database/connection.php');
$id = $_SESSION['user_id'];
$name = $_FILES['photo']['name'];
$extension = pathinfo($name,PATHINFO_EXTENSION);
$folder = "photos_profile/".md5(time()).".$extension";
$temp_name = $_FILES['photo']['tmp_name'];
if(move_uploaded_file($temp_name,$folder)){
    $sql = "UPDATE users SET photo='$folder' WHERE user_id='$id'";
    $result = mysqli_query($con, $sql);
    if(!$result){
        $message = '<div class="alert alert-danger">Erreur réessayer plutard!</div>';
        echo $message;
    }else{
        $message = '<div class="alert alert-success">Photo de profile ajoutée avec succés!!</div>';
        echo $message; 
    }
}
