<?php session_start();
if (!isset($_SESSION['login']) and !isset($_SESSION['id'])){header('location:../index.php');}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FUTUROOM</title>
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

 $_SESSION['login'] = maj_login( $_SESSION['id']);

 include '../includes/header-nav.php';
?>




<?php

@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
@$confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
@$original_password = password_hash($_POST['original_password'], PASSWORD_DEFAULT);

if ( isset($_POST['submit']) )//check bouton submit

    {
        if ( $_POST['login'] != NULL)// check si login a été rentré// --------------------------------------------------------------changement login--------------------------------------------------------

            {

                $bdd = connection_bdd();
                $donnees_uilisateur = recherche_login_existant($bdd);
                $bdd = NULL;

                    if ( @$donnees_uilisateur['login'] == NULL)// pas  de login deja existant, on passe à la suite

                        {

                            if ($_POST['original_password'] != NULL)// on vérifie le password d'origine pour modifier le login

                                    {
                                        $donnees = verif_password($_SESSION['id']);

                                          if (password_verify($_POST['original_password'], $donnees['password']  ))// si ok, on peut updater le login
                                                  
                                                {

                                                  $login_modifie = modification_login($login,$_SESSION['id']);
                                      
                                                }


                                          else  { $erreur_password = 'Mot de passe incorrect';}


                                    }
                            
                              else  { $saisir_password = 'Veuillez entrer votre mot de passe';}
                        }    
            
                    else {$login_deja_pris = 'Ce login est déjà utilisé, veuillez en choisir un autre';}


            } 

  if (  $_POST['confirm_password'] And $_POST['password'] != NULL )// --------------------------------------------------------------changement password--------------------------------------------------------

            {
                if ( preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['password']) )

                        {
                                if ( $_POST['confirm_password'] == $_POST['password']  )
                                      {

                                        $bdd = connection_bdd();
                                        $requete = $bdd->prepare('SELECT password FROM utilisateurs WHERE id = :id');
                                        $requete->execute(array('id' => $_SESSION['id']));
                                        $donnees = $requete->fetch();
                                        $bdd = NULL;

                                           if (password_verify($_POST['original_password'], $donnees['password']  ))

                                                    { 

                                                      $mot_passe_change = maj_password($password, $_SESSION['id']);
                                             
                                                      echo '<meta http-equiv="refresh" content="2;url=profil.php" />';
                                                    
                                                    }
                                          else { $erreur_password = 'Mot de passe incorrect'; }
                                     
                                      }
                
                                else { $mdp_pas_identiques = ' Les mots de passe ne sont pas identiques';}  
                                
                        }    
                
                else {$erreur_format_mdp = 'le mot de passe doit contenir entre 8 et 15 caractères, avec au minimum : Une majuscule, un chiffre et un caractère spécial.';}


            }


// ---------------------------------------cas de mauvaise saisi de formulaire
 if ( $_POST['confirm_password']== NULL AND $_POST['password']== NULL AND $_POST['login'] == NULL  )

      {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}


 if ( $_POST['confirm_password']== NULL AND $_POST['password']!= NULL )

      {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}


 if ( $_POST['confirm_password']!= NULL AND $_POST['password']== NULL )

      {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}


      }



?>

?>

 <!-- Main Content -->

  <div id='form1' class="container d-flex align-items-center vh-100">
    <div  class="row  h-75 d-flex align-items-center  mx-auto w-75">
      <div class=" col-12   d-flex flex-column justify-content-center ">


  
      

        <form name="connexion"  action="profil.php"  method="post">
        <h1 class="text-uppercase text-center mb-3">modifier votre profil</h1>

                <p class="text-center text-primary"><?php if(isset($login_modifie)){echo $login_modifie;}?></p>
                <p class="text-center text-primary"><?php if(isset($mot_passe_change)){echo $mot_passe_change;}?></p>
                <p class="text-center text-danger"><?php if(isset($champs_vides)){echo $champs_vides;}?></p>
                <p class="text-center text-danger"><?php if(isset($login_deja_pris)){echo $login_deja_pris;}?></p>
                <p class="text-center text-danger"><?php if(isset($mdp_pas_identiques)){echo $mdp_pas_identiques;}?></p>
                <p class="text-center text-danger"><?php if(isset($erreur_format_mdp)){echo $erreur_format_mdp;}?></p>
                <p class="text-center text-danger"><?php if(isset($tous_champs_vides)){echo $tous_champs_vides;}?></p>
        <p class='text-center'>Login actuel : <span class='text-primary'><?php echo $_SESSION["login"];?></span></p>
          <p class=" text-center text-primary">
          </p>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Modifier le  login</label>
              <input type="text" class="form-control" placeholder="Login"  name="login"   data-validation-required-message="Veuillez saisir votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
  
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Modifier le password</label>
              <input type="password" class="form-control" placeholder="Modifier le password" name="password"  data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Confirmer le nouveau password</label>
              <input type="password" class="form-control" placeholder="Confirmer le nouveau password" name="confirm_password"  data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Saisir votre mot de passe actuel :</label>
              <input type="password" class="form-control" placeholder="Saisir votre mot de passe actuel" name="original_password"  data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <br>
          <p class="text-center text-danger"><?php if(isset($saisir_password)){echo $saisir_password;}?></p>
          <p class="text-center text-danger"><?php if(isset($erreur_password)){echo $erreur_password;}?></p>

          <div id="success"></div>
          <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Valider les modifications</button>
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
