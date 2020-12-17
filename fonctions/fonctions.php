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

    $req = $bdd->prepare(' SELECT reservations.id, titre, description, login, debut, fin FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE DATE_FORMAT(debut, "%k") = :heure_debut AND DATE_FORMAT(debut, "%e") = :jour ');
    $req->execute(array( 'heure_debut' => $heuredebut,
                         'jour' => $day  ));
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($donnees);
    // echo '</pre>';
    if ( $donnees!= null)

    {
        $_GET_['id'] = $donnees['id'];

        ?>
        
        <a class="lien_reserve mb-0 p-0" href="pages/reservations.php?id=<?php echo $_GET_['id'];?> "><div class="bg-primary text-dark"><?php echo $donnees['login']?></br><span class="text-muted "><?php echo $donnees['titre']?></span></div></a>

    <?php
    }

    else
    {
        // var_dump($day,$heuredebut)
        ?>
        <a class="test_lien " href="pages/reservations-form.php?day=<?php echo $day;?>&heure=<?php echo $heuredebut;?> ">Effectuer une réservation</a>
        <?php
        // echo '<a class="test_lien " href="">Effectuer une réservation</a>';
    }

    $day++;
  
}




function definition_champs($bdd, $heuredebut, $day, $heurefin)
{

    if($heuredebut < 8 OR $heuredebut > 18 OR $day == 9 OR $day == 10  ){echo '<hr>';}

    else{recherche_reservation($bdd, $heuredebut, $day);}

}

function recherche_login_existant($bdd)

{

$requete = $bdd->prepare('SELECT login FROM utilisateurs WHERE login = :login');
$requete->execute(array('login' => $_POST['login']));
$données_utilisateur = $requete->fetch();

return $données_utilisateur;
}




function affichage_details_reservation($bdd)
{
    $req = $bdd->prepare(' SELECT titre, description, login,debut,fin FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id = :id ');
    $req->execute(array( 'id' => $_GET['id']
                         ));
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($donnees);
    // echo '</pre>';
    return $donnees;

}


function verif_champs_vides($a,$b,$c,$d)
{
    if ($a != NULL AND $b != NULL AND $c != NULL AND $d != NULL)
    { return TRUE;}
    else
    { return false;}

}

function verif_creneau_non_libre($a,$b)
{
    
    $bdd = connection_bdd();
    $req = $bdd->prepare(' SELECT * FROM reservations  WHERE debut = :debut AND fin = :fin ');
    $req->execute(array(    'debut' => $a,
                            'fin' => $b,
                         ));
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    $bdd = NULL;
    if(empty($donnees))
    {return FALSE;}
    else {return TRUE;}

}

function enregistrment_reservation($a,$b,$c,$d,$e)
{
    $bdd = connection_bdd();
    $requete_new_user = $bdd->prepare('INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :fin, :id_utilisateur)');
    $requete_new_user->execute(array(
                        'titre' => $a,                                                                         
                        'description' =>$b,
                        'debut' => $c, // $date_debut,
                        'fin' => $d, //$date_fin,
                        'id_utilisateur' => $e //-------------------------------------------------penser à mettre l'id de l'utilisateur connecté------------------------------------------------------------------------------
                                    ));
    $bdd = NULL;

}














?>