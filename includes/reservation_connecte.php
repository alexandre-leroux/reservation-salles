<?php

//---------récupération des heure et date du formulaire. Concaténation pour former un datetime, avec incrément d'une heure pour correspondre au réservations d'une heure
$date1 = @$_POST['debut-resa'];
$date2 = @$_POST['debut-resa'];
$heure_fin = @$_POST['heure_debut'];
$date_debut = $date1 .=' '. @$_POST['heure_debut'].=':00:00';
++$heure_fin;
$date_fin = $date2.=' '. $heure_fin .=':00:00';






if (isset($_POST['submit']))
    {  
      if ( verif_champs_vides($_POST['titre'],$_POST['description'],$_POST['debut-resa'],$_POST['heure_debut'] == TRUE ))
            {
              if ( verif_creneau_non_libre($date_debut,$date_fin) == FALSE)

                    {
                     //-------------------------------------------------penser à mettre l'id de l'utilisateur connecté------------------------------------------------------------------------------
                      enregistrment_reservation($_POST['titre'],$_POST['description'], $date_debut,$date_fin,$_SESSION['id']);
                      $reservation_ok = 'Créneau bien réservé';
                    }

              else     { $creneau_deja_pris = '  Ce créneau n\'est pas disponible';} 
            }      
        else { $champs_vides = ' Veullez saisir tous les champs';}
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
    <input name='debut-resa' type="date" class="form-control" min="2021-01-04" max="2021-01-08"   >
    <p class="help-block text-danger"></p>
  </div>
</div>


<p>Choix du créneaux</p>
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
<br>




<p class=' text-center text-danger'>
    <?php   

            if (@$champs_vides != NULL) {echo $champs_vides ;}

            if (@$creneau_deja_pris != NULL) {echo $creneau_deja_pris ;}
            

    ?>
</p>
<p class=' text-center text-primary'>
    <?php   

            if (@$reservation_ok != NULL) {echo $reservation_ok ;}

    ?>
</p>

<div id="success"></div>
<button name='submit' type="submit" class="btn btn-primary" id="sendMessageButton">Reserver</button>
</form>
      </div>
    </div>
  </div>
