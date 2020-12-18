


        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">

            <?php  if(!isset($page_index_php)) { echo '   <a class="navbar-brand js-scroll-trigger" href="../index.php">futuroom</a>' ;} ?>
            <?php  if(isset($page_index_php)) { echo '  <a class="navbar-brand js-scroll-trigger" href="index.php">futuroom</a> ' ; }?>


            <?php
             if (isset($page_index_php))//modifie les liens selon la page d'origine
             
             {?>

               
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                 type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/inscription.php">S\'inscrire</a>' ;} ?>
                            <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/profil.php">'. $_SESSION['login'].'</a> ' ; }?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                             <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/connexion.php">Se connecter</a>' ;} ?>
                             <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/deconnexion.php">Se déconnecter</a>' ;} ?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/planning.php">Disponibilité</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                             <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="pages/reservations-form.php">réservation</a>' ;} ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
             }
             else
             {
                ?>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                 type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="inscription.php">S\'inscrire</a>' ;} ?>
                            <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="profil.php">'. $_SESSION['login'].'</a> ' ; }?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                             <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="connexion.php">Se connecter</a>' ;} ?>
                             <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="deconnexion.php">Se déconnecter</a>' ;} ?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="planning.php">Disponibilité</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                             <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="reservations-form.php">réservation</a>' ;} ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
             }
             ?>