<?php include('includes/header.php');?>
<?php
if(isset($_SESSION['user_id'])){
    header("location:index.php");
}
if(isset($_POST['login'])){
$errors = "";
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST["passe"], FILTER_SANITIZE_STRING);
if(empty($email)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre email</div>';
}
if(empty($password)){
    $errors.= '<div class="alert alert-danger">Veuillez entrer votre mot de passe</div>';
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors .= '<div class="alert alert-danger">Email invalide</div>';   
}
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);
$password = hash('sha256', $password);
//check if user exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($con, $sql);
if(!$result){
    $errors.= '<div class="alert alert-danger">Erreur réessayer!</div>';
}
//If email & password don't match print error
$count = mysqli_num_rows($result);
if($count !== 1){
    $errors.= '<div class="alert alert-danger">Email ou mot de passe est incorrect!</div>';
}
if($errors){
    echo '<div class="row"><div class="col-md-4 col-md-offset-4">'.$errors.'</div></div>';
}else {
    //log the user in: Set session variables
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['logged'] = true;
    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['email']=$row['email'];
    
    if(empty($_POST['remember'])){
        //If remember me is not checked
        header("location:index.php");
    }else{
        //Create two variables $authentificator1 and $authentificator2
        $auth1 = bin2hex(openssl_random_pseudo_bytes(10));
        $auth2 = openssl_random_pseudo_bytes(20);
        //Store them in a cookie
        function f1($a, $b){
            $c = $a . "," . bin2hex($b);
            return $c;
        }
        $cookie = f1($auth1, $auth2);
        setcookie(
            "rememberme",
            $cookie,
            time() + 1296000
        );
        
        //Run query to store them in rememberme table
        function f2($a){
            $b = hash('sha256', $a); 
            return $b;
        }
        $fauth2 = f2($auth2);
        $user_id = $_SESSION['user_id'];
        $expiration = date('Y-m-d H:i:s', time() + 1296000);
        $sql = "INSERT INTO rememberme
        (`authentificator1`, `f2authentificator2`, `user_id`, `expires`)
        VALUES
        ('$authentificator1', '$fauth2', '$user_id', '$expiration')";
        $result = mysqli_query($con, $sql);
        if(!$result){
            echo  '<div class="alert alert-danger">Erreur réessayer</div>';  
        }else{
            header("location:index.php"); 
        }
    }
}
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <form method="post" action="login.php">
                    <h3 class="text-info">
                        Connexion: 
                    </h3>
                    <hr>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="loginpassword" class="sr-only">Mot de passe:</label>
                        <input class="form-control" type="password" name="passe" id="passe" placeholder="Mot de passe" maxlength="30">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember">
                                Rester connecté
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-info">
                            Connexion
                        </button>  
                    </div>
                    <hr>
                    <a href="forgotpassword.php" class="btn btn-link">
                        Mot de passe oublié?
                    </a>
                </form>
            </div>              
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>