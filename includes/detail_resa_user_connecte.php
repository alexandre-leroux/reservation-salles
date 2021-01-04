<?php

$bdd = connection_bdd();

$donnees = affichage_details_reservation($bdd);

?>

<div class="container  d-flex  vh-100">
<div class="row  h-75 w-75 mx-auto my-auto">
<div class="col-12  mx-auto mt-5 border border-3 rounded border-primary shadow text-center d-flex flex-column justify-content-around align-items-center ">




<?php  
    $date = date_create($donnees['debut']); 
    $date_jour =  date_format($date, ' d m Y');
    $heure_debut = date_format($date, ' H ');
    $date_fin = date_create($donnees['fin']);
    $heure_fin = date_format($date_fin, ' H ');
 ?>
<h1 class="mt-5">Salle reservée par : <?php echo $donnees['login']; ?></h1></br>
<h1>Le <?php echo $date_jour ; ?>  de<?php echo $heure_debut ; ?>h à <?php echo $heure_fin ; ?>h </h1></br>
<h1>Titre : <?php echo $donnees['titre']; ?></h1></br>
<h1>Description : </h1><p><?php echo $donnees['description']; ?></p></br>



</div></div></div>