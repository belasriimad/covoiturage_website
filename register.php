<?php include('includes/header.php');?>
<?php
if(isset($_SESSION['user_id'])){
    header("location:index.php");
}
if(isset($_POST['signup'])){
$errors = "";
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);  
$firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$gender = isset($_POST["gender"]) ? $_POST['gender'] : "";
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
$confirmation = filter_var($_POST["password2"], FILTER_SANITIZE_STRING); 
$phonenumber = filter_var($_POST["tel"], FILTER_SANITIZE_STRING);
$moreinformation = filter_var($_POST["desc"], FILTER_SANITIZE_STRING);
if(empty($username)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre pseudo</div>';
}
if(empty($firstname)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre nom</div>';
}
if(empty($lastname)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre prénom</div>';
}
if(empty($email)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre email</div>';
}
if(empty($gender)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre sexe</div>';
}
if(empty($password)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre mot de passe</div>';
}
if(empty($phonenumber)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre téléphone</div>';
}
if(empty($moreinformation)){
    $errors.= '<div class="alert alert-danger">Veuillez fournir des infos</div>';
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors .= '<div class="alert alert-danger">Email invalide</div>';   
}
if($password !== $confirmation){
    $errors .= '<div class="alert alert-danger">Les mot de passes ne sont pas identiques!</div>';
}
$username = mysqli_real_escape_string($con, $username);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);
//$password = md5($password);
$password = hash('sha256', $password);
//If username exists in the users table print error
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $sql);
if(!$result){
    $errors .=  '<div class="alert alert-danger">Erreur réessayer!</div>';
}
$results = mysqli_num_rows($result);
if($results){
    $errors .=  '<div class="alert alert-danger">Pseudo existe déja!</div>';
}
//If email exists in the users table print error
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if(!$result){
    $errors .=  '<div class="alert alert-danger">Erreur réessayer!</div>';
}
$results = mysqli_num_rows($result);
if($results){
    $errors .=  '<div class="alert alert-danger">Email déja utilisé connectez vous</div>';
}
if(!$result){
    $errors .= '<div class="alert alert-danger">Erreur réessayer!</div>'; 
}
if($errors){
    echo '<div class="row"><div class="col-md-4 col-md-offset-4">'.$errors.'</div></div>';
}else{
    //Insert user details and activation code in the users table
    $sql = "INSERT INTO users (`username`, `email`, `password`, `first_name`, `last_name`, `phonenumber`, `gender`, `moreinformation`) VALUES ('$username', '$email', '$password','$firstname', '$lastname', '$phonenumber', '$gender', '$moreinformation')";
    $result = mysqli_query($con, $sql);
    echo '<div class="alert alert-success">Compte créé avec succés!</div>'; 
    exit;
}
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <form method="post">
                    <h3 class="text-info">Inscription</h3>
                    <hr>
                        <div class="form-group">
                            <label for="username">Pseudo:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Pseudo" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="">Nom:</label>
                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Nom" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="">Prénom:</label>
                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Prénom" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="email" class="">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Mot de passe:</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Mot de passe" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="">Confirmez le mot de passe</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirmation" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="tel" class="">Téléphone:</label>
                            <input class="form-control" type="text" name="tel" id="tel" placeholder="Téléphone" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label><input type="radio" name="gender" id="male" value="male">Homme</label>
                            <label><input type="radio" name="gender" id="female" value="female">Femme</label>
                        </div>
                        <div class="form-group">
                            <label for="desc">Déscription: </label>
                            <textarea name="desc" class="form-control" rows="5" maxlength="300"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" name="signup" type="submit" value="Valider">
                        </div>
                </form>
            </div>              
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>