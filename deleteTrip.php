<?php
//start session and connect
session_start();
include('database/connection.php');
$sql="DELETE FROM carsharetrips WHERE trip_id='".$_POST['trip_id']."' AND user_id = '".$_SESSION['user_id']."'";
$result = mysqli_query($con, $sql);
$message = '<div class="alert alert-success">Trajet supprimé avec succés!</div>';
echo $message; 
?>