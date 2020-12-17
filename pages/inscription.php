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
@$confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

if ( isset($_POST['submit']) )


      {

          if ( $login != NULL    AND      $password != NULL     AND    $confirm_password != NULL      )


            {


                $bdd = connection_bdd();
                $donnees_utilisateurs = recherche_login_existant($bdd);
              

                    if ( $donnees_utilisateurs == TRUE )

                          {
                            $login_deja_pris = 'Login déjà utilisé, veuillez en choisir un autre.';
                            $bdd = NULL;
                          }

                    elseif ($donnees_utilisateurs == NULL AND $_POST['password'] != $_POST['confirm_password'])

                          {
                            $mdp_pas_identiques = 'Les mots de passe ne sont pas identiques.';
                            $bdd = NULL;
                          }

                    elseif ($donnees_utilisateurs == NULL AND $_POST['password'] ==  $_POST['confirm_password'])

                            {

                              $inscription_reussie = inscription_utilisateur($login,$password);

                            }

            }

          else

          {
            // message erreur champs manquants
              $champs_vides = 'Veuiller remplir tous les champs.';
              $bdd = null;
          }

      } 



?>

 <!-- Main Content -->
 <div id='form_inscription' class="container d-flex vh-100">
    <div class="row  h-75 my-auto mx-auto w-75">
      <div class="col-12 w-75 h-75 my-auto  ">
      <p class=' text-center text-success'>
              <?php  
                 
                      if ( isset($inscription_reussie)) {echo  'Inscription validée, vous allez être redirigé vers la page de connexion. <meta http-equiv="refresh" content="2;url=connexion.php" />' ;}
                      
              ?>
        </p>
        <form class="mt-5 pt-5"  name="sentMessage" id="contactForm" action="inscription.php" method="post">

<div class="control-group  ">
  <div class="form-group floating-label-form-group controls">
    <label>Choisissez votre login</label>
    <input name='login' type="text" class="form-control" placeholder="Choisissez votre login" id="Login"  data-validation-required-message="Veuillez saisir votre login.">
    <p class="help-block text-danger"></p>
  </div>
</div>

<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label>Mot de passe</label>
    <input name='password' type="password" class="form-control" placeholder="Mot de passe" id="password"   data-validation-required-message="Veuillez saisir votre mot de passe.">
    <p class="help-block text-danger"></p>
  </div>
</div>

<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label>Confirmer le mot de passe</label>
    <input name='confirm_password' type="password" class="form-control" placeholder="Confirmer le mot de passe" id="password"   data-validation-required-message="Veuillez saisir votre mot de passe.">
    <p class="help-block text-danger"></p>
  </div>
</div>

<br>
<p class=' text-center text-danger'>
    <?php  
            if (@$caract_mdp_non_respecte != NULL) {echo $caract_mdp_non_respecte ;}

            if (@$champs_vides != NULL) {echo $champs_vides ;}

            if (@$mdp_pas_identiques != NULL) {echo  $mdp_pas_identiques ;}
  
            if (@$login_deja_pris != NULL) {echo  $login_deja_pris ;}

    ?>
</p>

<div id="success"></div>
<button name='submit' type="submit" class="btn btn-primary" id="sendMessageButton">C'est parti !</button>
</form>
      </div>
    </div>
  </div>


  <?php
            include '../includes/footer.php';
        ?>

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
