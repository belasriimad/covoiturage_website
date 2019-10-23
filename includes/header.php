<?php 
include('./database/connection.php');
//Start session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav role="navigation" class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a href="index.php" class="navbar-brand">Covoiturage.com</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="trips.php">Trajets</a></li>
                    <li><a href="add.php">Ajouter</a></li>
                    <li><a href="#">Aide</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <?php if(isset($_SESSION['logged']) && isset($_SESSION['user_id'])):?>
                    <li><a href="profile.php" title="profile"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""?></a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                    <li><a href="mytrips.php">Mes trajets</a></li>
                  <?php else:?>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="register.php">Inscription</a></li>
                  <?php endif;?>
                  </ul>
              </div>
          </div>
    </nav>