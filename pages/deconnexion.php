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
    include '../includes/header-nav.php';
?>




        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center d-flex align-items-center vh-100">
            <div class="container d-flex align-items-center w-100 flex-column">

                <!-- Masthead Heading-->
                <p class="masthead-heading text-uppercase tex-nowrap mb-5">Vous allez être déconnecté</p></br> 
                <!-- Icon Divider-->
</br> 
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Merci de votre visite.</p>
                <p class="masthead-subheading font-weight-light mb-0">A bientôt sur FUTUROOM</p>
            </div>
        </header>
<?php
    session_destroy();
?>

<meta http-equiv="refresh" content="2;url=../index.php" />


        
<?php
    include '../includes/footer.php';
?>
     
   

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
