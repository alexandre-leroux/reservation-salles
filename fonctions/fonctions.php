<?php


function connection_bdd()
{
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}


function recherche_reservation($bdd, $heuredebut, $day)
{
    $req = $bdd->prepare(' SELECT * FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE  DATE_FORMAT(debut, "%k") = :heure_debut AND DATE_FORMAT(debut, "%e") = :jour ');
    $req->execute(array( 'heure_debut' => $heuredebut,
                         'jour' => $day  ));
    $donnees = $req->fetch(PDO::FETCH_ASSOC);

    if ( $donnees!= null){echo '<a class="lien_reserve mb-0 p-0" href=""><div class="bg-primary text-dark">'.$donnees['login'].'</br><span class="text-muted ">'.$donnees['titre'].'</span></div></a>';}

    else{echo '<a class="test_lien " href="">Effectuer une réservation</a>';}    $day++;
  
}




function definition_champs($bdd, $heuredebut, $day, $heurefin)
{

    if($heuredebut < 8 OR $heuredebut > 18 OR $day == 9 OR $day == 10  ){echo '<hr>';}

    else{recherche_reservation($bdd, $heuredebut, $day);}

}


























?>