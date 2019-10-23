<?php
//mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db")
$con = mysqli_connect("localhost", "root","","carsharing");
if(mysqli_connect_error()){
    die('ERROR:' . mysqli_connect_error()); 
    echo "<script>window.alert('Erreur!')</script>";
}
?>