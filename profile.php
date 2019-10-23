<?php 
include('includes/header.php');
$user_id = $_SESSION['user_id'];
//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $username = $row['username'];
    $email = $row['email']; 
    $photo = $row['photo'];
}else{
    echo "Erreur!";   
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table preview">
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Photo</th>
                    </tr>
                    <tr>
                        <td><?php echo $username;?></td>
                        <td><?php echo $email;?></td>
                        <td><a href="#" data-toggle="modal" data-target="#updatePhoto"><img src="<?php echo $photo;?>" height="50px"></a></td>
                    </tr>
                </table>
                <div class="modal" id="updatePhoto" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form method="post" id="updateprofileimage" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal">
                                        &times;
                                    </button>
                                    <h4 id="myModalLabel">
                                        Modifier la photo de profile: 
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p id="message">

                                    </p>
                                    <p>
                                       <img src="<?php echo $photo; ?>" height="300px" id="preview"></a>
                                    </p>
                                    <div class="form-group">
                                        <label for="username" >Séléctionner une image:</label>
                                        <input class="form-control" type="file" name="photo" id="img">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input class="btn btn-success" name="updatephoto" type="submit" value="Valider">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                       Annuler
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php');?>