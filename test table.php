<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php
require('fonctions/fonctions.php');
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/inscription.php">S'inscrire</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Se connecter</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Disponibilité</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<a href=""><div></div></a>
           

<div class="container-fluid mt-5 pt-5 ">
<div class="row ">
<div class="col-12">

<div class="table-responsive">
    <h1 class="text-center m-5 ">JANVIER 2021</h1>
<table class="table table-bordered " >
<thead>
    <tr class="text-center ">
        <td id="heure">heure</td>
        <td class="jour-semaine">Lundi 4</td>
        <td class="jour-semaine">Mardi 5</td>
        <td class="jour-semaine">Mercredi 6</td>
        <td class="jour-semaine">Jeudi 7</td>
        <td class="jour-semaine">Vendredi 8</td>
        <td class="jour-semaine">Samedi 9</td>
        <td class="jour-semaine">Dimanche 10</td>
    </tr>
  </thead>
<?php



$bdd = connection_bdd();




$plage_horaire=0;
$heuredebut =1;
$heurefin = 2;

while ( $plage_horaire< 23)
{?>

  
  <tbody class="mt-5">
    <tr class="text-center " >
        <td class="text-nowrap  "><?php echo $heuredebut.'h à '. $heurefin.'h';?></td>

        <td class="align-middle mb-0 p-0"><?php    $day = 4;      definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;  ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;   ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;  ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;  ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;  ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin); $day++;    ?></td>

        <td class="align-middle mb-0 p-0"><?php                   definition_champs($bdd, $heuredebut, $day, $heurefin);   ?></td>
    </tr>
  </tbody>



<?php $plage_horaire++;$heuredebut++;$heurefin++;
}


?>
</table>
<?php $bdd = null; ?>

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
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>



        
    </body>
</html>
