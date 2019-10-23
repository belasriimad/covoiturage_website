<?php include('includes/header.php');?>
<?php
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
$id = $_GET['id'];
$sql="SELECT * FROM carsharetrips WHERE user_id='".$_SESSION['user_id']."' AND trip_id = '$id'";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_array($result);
?>
<div class="container">
<div id="result"></div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <form method="post" id="editTrip">
                    <h3 class="text-info">Modifier un trajet</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div id="map">

                            </div>
                        </div>    
                    </div>
                    <hr>
                        <div class="form-group">
                            <label for="from">Départ:</label>
                            <input class="form-control" type="text" name="from" id="from" placeholder="Départ" maxlength="30" value="<?php echo $row["departure"];?>">
                        </div>
                        <div class="form-group">
                            <label for="to" class="">Destination:</label>
                            <input class="form-control" type="text" name="to" id="to" placeholder="Destination" maxlength="30" value="<?php echo $row["destination"];?>">
                        </div>
                        <div class="form-group">
                            <label for="price" class="">Prix par passager:</label>
                            <input class="form-control" type="number" name="price" id="price" placeholder="Prix" maxlength="30" value="<?php echo $row["price"];?>">
                        </div>
                        <div class="form-group">
                            <label for="places" class="">Nombre de place:</label>
                            <input class="form-control" type="number" name="places" id="places" placeholder="Places" maxlength="50" value="<?php echo $row["seatsavailable"];?>">
                        </div>
                        <div align="center"><img src="ajax-loader.gif" id="loader"/></div>
                        <div class="form-group">
                            <label for="dateD" class="">Date de départ:</label>
                            <input class="form-control" type="date" name="dateD" id="dateD" placeholder="Date" maxlength="30" value="<?php echo $row["date"];?>"></div>
                        <div class="form-group">
                            <label for="time" class="">Heure:</label>
                            <input class="form-control" type="time" name="time" id="time" placeholder="Heure" maxlength="30" value="<?php echo $row["time"];?>">
                            <input class="form-control" type="hidden" name="post_id" id="post_id"  value="<?php echo $row["trip_id"];?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">Plus d'infos: </label>
                            <textarea name="desc" class="form-control" rows="5" maxlength="300"><?php echo $row["comments"];?></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" name="signup" type="submit" value="Valider">
                        </div>
                </form>
            </div>              
        </div>
    </div>
</div>
<?php }}?>
<?php include('includes/footer.php');?>