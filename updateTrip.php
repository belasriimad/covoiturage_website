<?php
include('database/connection.php');
session_start();
$errors = "";
$trip_id =  filter_var($_POST["post_id"],FILTER_SANITIZE_STRING);  
$user_id = $_SESSION['user_id'];
$from = filter_var($_POST["from"], FILTER_SANITIZE_STRING);  
$to = filter_var($_POST["to"], FILTER_SANITIZE_STRING);
$price = filter_var($_POST["price"], FILTER_SANITIZE_STRING);
$date = filter_var($_POST["dateD"], FILTER_SANITIZE_EMAIL);
$time = isset($_POST["time"]) ? $_POST['time'] : "";
$desc = filter_var($_POST["desc"], FILTER_SANITIZE_STRING); 
$places = filter_var($_POST["places"], FILTER_SANITIZE_STRING); 
$departLat = isset($_POST["departureLatitude"]) ? $_POST["departureLatitude"] : "";
$departLong =  isset($_POST["departureLongitude"]) ? $_POST["departureLongitude"] : "";
$destLat =  isset($_POST["destinationLatitude"]) ? $_POST["destinationLatitude"] : "";
$destLong =  isset($_POST["destinationLongitude"]) ? $_POST["destinationLongitude"] : "";
if(empty($from)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer le départ</div>';
}
if(empty($to)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer la destination</div>';
}
if(empty($price)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer le prix</div>';
}
if(empty($date)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer la date</div>';
}
if(empty($time)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer l\'heure</div>';
}
$to = mysqli_real_escape_string($con, $to);
$from = mysqli_real_escape_string($con, $from);
$price = mysqli_real_escape_string($con, $price);
//$password = md5($password);
$desc = mysqli_real_escape_string($con, $desc);
if($errors){
    echo '<div class="row"><div class="col-md-4 col-md-offset-4">'.$errors.'</div></div>';
}else{
    $sql = "UPDATE carsharetrips SET `departure`= '$from',`departLong`='$departLong',`departureLat`='$departLat', `destination`='$to',`destLong`='$destLong',`destinationLat`='$destLat', `price`='$price', `seatsavailable`='$places', `date`='$date', `time`='$time'  WHERE `trip_id`='$trip_id' AND user_id ='$user_id' ";   
    $result = mysqli_query($con, $sql);
    if(!$result){
        echo '<div class="row"><div class="col-md-4 col-md-offset-4"><div class="alert alert-danger">'.mysqli_error($con).'</div></div>'; 
    }else{
        echo '<div class="row"><div class="col-md-4 col-md-offset-4"><div class="alert alert-success">Trajet modifié avec succés!</div></div>'; 
    }
}
?>