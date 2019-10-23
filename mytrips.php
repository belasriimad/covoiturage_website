<?php 
include('includes/header.php');
$sql="SELECT * FROM carsharetrips WHERE user_id='".$_SESSION['user_id']."'";
?>
<div class="container">
<div id="result"></div>
<?php if($result = mysqli_query($con, $sql)):?>
<?php if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)):?>
    <div class="row" align="center">
        <div class="col-md-8 col-md-offset-2">
           <div align="center"><img src="ajax-loader.gif" id="loader"/></div>
            <div class="trip">
                <div class="row">
                    <a href="viewTrip.php?id=<?php echo $row['trip_id'];?>">
                        <div class="col-md-8">
                            <p>
                                <span class="text-info">Départ : </span><small><?php echo $row["departure"];?></small><br>
                                <span class="text-info">Destination :</span><small><?php echo $row["destination"];?></small><br>
                                <span class="text-info">Le :</span><small><?php echo $row["date"];?> à <?php echo $row["time"];?></small>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p>
                                <span class="text-danger"><?php echo $row["price"].' '.'DH';?></span><br>
                                <span class="text-success"><?php echo $row["seatsavailable"].' '.'place(s)';?></span><br>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <div class="row" style="padding-right:10px">
                                <div class="col-md-1">
                                    <p><a href="editTrip.php?id=<?php echo $row['trip_id'];?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></p>
                                </div>
                                <div class="col-md-1">
                                    <p><a onclick="deleteTrip(<?php echo $row['trip_id'];?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>  
        </div>
    </div>
<?php 
endwhile;
}
?>
<?php endif;?>  
<?php include('includes/footer.php');?>