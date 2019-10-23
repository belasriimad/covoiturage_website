<?php 
include('includes/header.php');
$sql="SELECT * FROM users u,carsharetrips c WHERE c.user_id = u.user_id AND trip_id = '".$_GET['id']."'";
?>
<div class="container">
<div id="result"></div>
<?php if($result = mysqli_query($con, $sql)):?>
<?php if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);?>
    <div class="row" align="center">
        <div class="col-md-8 col-md-offset-2">
           <div align="center"><img src="ajax-loader.gif" id="loader"/></div>
           <div class="trip">
                <div class="row">
                    <div class="col-md-4">
                        <p>
                           <img src="<?php echo $row['photo'];?>" height="80" width="100" alt="" id="profileImg">
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <span class="text-info">Nom : </span><small><?php echo $row["first_name"];?></small><br>
                            <span class="text-info">Prénom :</span><small><?php echo $row["last_name"];?></small><br>
                            <span class="text-info">Tél :</span><small><?php echo $row["phonenumber"];?></small>
                        </p>
                    </div>
                </div>
            </div>  
            <div class="trip">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <span class="text-info">Départ : </span><small><?php echo $row["departure"];?></small><br>
                            <span class="text-info">Destination :</span><small><?php echo $row["destination"];?></small><br>
                            <span class="text-info">Le :</span><small><?php echo $row["date"];?> à <?php echo $row["time"];?></small><br>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            <span class="text-danger"><?php echo $row["price"].' '.'DH';?></span><br>
                            <span class="text-success"><?php echo $row["seatsavailable"].' '.'place(s)';?></span><br>
                        </p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
<?php 
}
?>
<?php endif;?>  
<?php include('includes/footer.php');?>