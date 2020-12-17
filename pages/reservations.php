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

<div class="container  d-flex  vh-100">
<div class="row  h-75 w-75 mx-auto my-auto">
<div class="col-12  mx-auto mt-5 border border-3 rounded border-primary shadow text-center d-flex flex-column justify-content-around align-items-center ">




<?php  
    $date = date_create($donnees['debut']); 
    $date_jour =  date_format($date, ' d m Y');
    $heure_debut = date_format($date, ' h ');
    $date_fin = date_create($donnees['fin']);
    $heure_fin = date_format($date_fin, ' h ');
 ?>
<h1 class="mt-5">Salle reservée par : <?php echo $donnees['login']; ?></h1></br>
<h1>Le <?php echo $date_jour ; ?>  de<?php echo $heure_debut ; ?>h à <?php echo $heure_fin ; ?>h </h1></br>
<h1>Titre : <?php echo $donnees['titre']; ?></h1></br>
<h1>Description : <?php echo $donnees['description']; ?></h1></br>



</div></div></div>



  

</div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
        <script src="../assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>



        
    </body>
</html>
