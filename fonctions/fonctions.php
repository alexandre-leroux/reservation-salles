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
    $req = $bdd->prepare(' SELECT * FROM reservations WHERE  DATE_FORMAT(debut, "%h") = :heure_debut AND DATE_FORMAT(debut, "%e") = :jour ');
    $req->execute(array( 'heure_debut' => $heuredebut,
                         'jour' => $day  ));
    $donnees = $req->fetch();
                          if ( $donnees!= null){echo 'touvé';}
                          else{echo 'non';}    $day++;
}








?>