<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
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

    <?php
require('../fonctions/fonctions.php');
?>
<?php

$bdd = connection_bdd();

$donnees = affichage_details_reservation($bdd);

?>

    <body id="page-top">


        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">futuroom</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">S'inscrire</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Se connecter</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Disponibilité</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php        


//---------récupération des heure et date du formulaire. Concaténation pour former un datetime, avec incrément d'une heure pour correspondre au réservations d'une heure
$date1 = $_POST['debut-resa'];
$date2 = $_POST['debut-resa'];
$heure_fin = $_POST['heure_debut'];
$date_debut = $date1 .=' '. $_POST['heure_debut'].=':00:00';
++$heure_fin;
$date_fin = $date2.=' '. $heure_fin .=':00:00';




if (isset($_POST['submit']))
  {$id =2;//-------------------------------------------------penser à mettre l'id de l'utilisateur connecté------------------------------------------------------------------------------
    echo $_POST['description'];
        $bdd = connection_bdd();
        $requete_new_user = $bdd->prepare('INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :fin, :id_utilisateur)');
                                    $requete_new_user->execute(array(
                                            'titre' => $_POST['titre'],                                                                         
                                            'description' => $_POST['description'],
                                            'debut' => $date_debut,
                                            'fin' => $date_fin,
                                            'id_utilisateur' => $id //-------------------------------------------------penser à mettre l'id de l'utilisateur connecté------------------------------------------------------------------------------
                                        ));
  }
?>
                                        
 <!-- Main Content -->

 <div id='form_inscription' class="container d-flex vh-100">

    <div class="row  h-75 my-auto mx-auto w-75">
      <div class="col-12 w-75 h-75 my-auto ">
      <p class=' text-center text-success'>
              <?php  
                 
                      if ( isset($inscription_reussie)) {echo  'Inscription validée, vous allez être redirigé vers la page de connexion. <meta http-equiv="refresh" content="2;url=connexion.php" />' ;}
                      
              ?>
        </p>
        <form  name="sentMessage" id="contactForm" action="reservations-form.php" method="post">
        <h1 class="text-uppercase text-center mb-3">réservation</h1>

<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Titre de la réservation</label>
    <input name='titre' type="text" class="form-control" placeholder="Titre de la réservation" id="titre"   data-validation-required-message="Veuillez saisir le titre de la réservation.">
    <p class="help-block text-danger"></p>
  </div>
</div>

<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label>description</label>
    <input name='description' type="text" class="form-control" placeholder="description" id="password"   data-validation-required-message="Veuillez saisir le début de la réservation.">
    <p class="help-block text-danger"></p>
  </div>
</div>
</br></br>

<p>Choix du jour</p>
<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <!-- <label>2021-01-05 12:00:00</label> -->
    <input name='debut-resa' type="date" class="form-control" min="2021-01-04" max="2021-01-08"   >
    <p class="help-block text-danger"></p>
  </div>
</div>


<p>Heure de début</p>
<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <select name="heure_debut" id="pet-heure_debut">
      <option value="8">8h à 9h</option>
      <option value="9">9h à 10h</option>
      <option value="10">10h à 11h</option>
      <option value="11">11h à 12h</option>
      <option value="12">12h à 13h</option>
      <option value="13">13h à 14h</option>
      <option value="14">14h à 15h</option>
      <option value="15">15h à 16h</option>
      <option value="16">16h à 17h</option>
      <option value="17">17h à 18h</option>
      <option value="18">18h à 19h</option>
    </select>
    <p class="help-block text-danger"></p>
  </div>
</div>

<!-- <p>Heure de fin</p>
<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <select name="heure_fin" id="pet-heure_fin">
      <option value="9">9h</option>
      <option value="10">10h</option>
      <option value="11">11h</option>
      <option value="12">12h</option>
      <option value="13">13h</option>
      <option value="14">14h</option>
      <option value="15">15h</option>
      <option value="16">16h</option>
      <option value="17">17h</option>
      <option value="18">18h</option>
      <option value="19">19h</option>
    </select>
    <p class="help-block text-danger"></p>
  </div>
</div> -->

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
<button name='submit' type="submit" class="btn btn-primary" id="sendMessageButton">Reserver</button>
</form>
      </div>
    </div>
  </div>



  

</div>
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
