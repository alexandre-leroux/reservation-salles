<?php session_start();
// if (isset($_SESSION['login']) and isset($_SESSION['id'])){header('location:../index.php');}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>



    <body id="page-top">
    <?php
 require('../fonctions/fonctions.php');
 include '../includes/header-nav.php';
 ?>




        <?php

@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ( isset($_POST['submit']))

      {
          if ($_POST['login'] != NULL AND $_POST['password'] != NULL)// test si les chammps sont remplis

              {

                // si ok, onteste si le login existe
                $données_utilisateur = connexion_utilisateur($login);
            

                    if ( $login == @$données_utilisateur['login'] AND password_verify($_POST['password'], $données_utilisateur['password'] ) )//si oui, on teste le password
                    
                          {
                            
                            $_SESSION['login']=$données_utilisateur['login'];
                            $_SESSION['id']=$données_utilisateur['id'];
                      
                            $connexion_reussie = 1;
                          
                          }
                          else {  $erreur_login_mdp = 'Erreur de login ou de mot de passe';}


              }

          else {$champs_manquants = 'Veuillez remplir l\'ensemble des champs';}    
          
      }



?>

 <!-- Main Content -->

  <div id='form1' class="container d-flex align-items-center vh-100">
    <div  class="row  h-75 d-flex align-items-center  mx-auto w-75">
      <div class=" col-12   d-flex flex-column justify-content-center ">

      <?php if ( isset($connexion_reussie))
      {?>
       <p class='text-center text-success'>Connexion reussie, vous allez être redirigé vers la page d'accueil</p>
       <meta http-equiv="refresh" content="2;url=../index.php" />
      <?php
      }
      ?>

        <form name="connexion"  action="connexion.php#form1"  method="post">
          <p class=" text-center text-primary">
          </p>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Login</label>
              <input type="text" class="form-control" placeholder="Login"  name="login" required  data-validation-required-message="Veuillez saisir votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
  
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password" required data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <br>
          <p class='text-center text-danger'><?php  if (isset($erreur_login_mdp)) {echo $erreur_login_mdp;} ?></p>
          <p class='text-center text-danger'><?php  if (isset($champs_manquants)) {echo $champs_manquants;} ?></p>

          <div id="success"></div>
          <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
  <?php
            include '../includes/footer.php';
        ?>


  <!-- Main Content -->



        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
    
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>



        
    </body>
</html>
