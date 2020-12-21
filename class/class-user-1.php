<?php

$user1 = new User();

$login = $user1->login = 'alex';
$password = $user1->password=  'password';
$email = $user1->email= 'emafdbdfbvdil';
$firstname = $user1->firstname=  'firvcvcvcvcst';
$lastname = $user1->lastname = 'lasgfgfgfgt';




class User{

    private $id;
    public  $login;
    public  $password;


    public function __constructor()

    public function connection_bdd()
        {
            try {
                 $bdd = new PDO('mysql:host=localhost;dbname=classes;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
            catch (Exception $e)
                {
            die('Erreur : ' . $e->getMessage());
                }

                return $bdd;
        }


    public function register(){

        $bdd = $this->connection_bdd();
        $requete = $bdd->prepare("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( :login,  :password, :email, :firstname, :lastname)");
        $requete->execute(array('login'=>$this->login,
                                'password'=>$this->password,
                                'email'=>$this->email,
                                'firstname'=>$this->firstname,
                                'lastname'=>$this->lastname,
                                ));
        echo ' enregistrement de l\'utilisateur ok <br>';

        $bdd = null;

                }
    public function connect(){
        $bdd = $this->connection_bdd();
        $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $requete->execute(array('login'=>$this->login));
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if (  $resultat['password'] == $this->password)
        {
     
        $this->id = $resultat['id'];
        $this->login = $resultat['login'];
        $this->email = $resultat['email'];
        $this->password = $resultat['password'];
        $this->firstname = $resultat['firstname'];
        $this->lastname = $resultat['lastname'];
        $bdd = null;
        $this->isconnect=1;
        echo ' utilisateur connecté <br>';
        }
        else { echo ' pas connecte <br>'; }

        return $resultat;
                                }

    public function disconnect(){
        unset($this->id, $this->login, $this->email, $this->password, $this->firstname, $this->lastname, $this->isconnect ) ;
        echo ' utilisateur deco';
        var_dump($this);    }


    public function delete(){
        $bdd = $this->connection_bdd();
        $this->connect();
        $requete = $bdd->prepare("DELETE  FROM utilisateurs WHERE id =:id ");
        $requete->execute(array('id'=>$this->id));
        $bdd = null;
        $this->disconnect();
        echo 'utilisateur supprimé et déconnecté';
    }
    public function update($login, $password, $email, $firstname, $lastname){
        $bdd = $this->connection_bdd();
        $this->connect();
       $requete = $bdd->prepare("UPDATE utilisateurs  SET login=:login, password=:password, email=:email, firstname=:firstname, lastname=:lastname  WHERE id = '$this->id' ");
       $requete->execute(array('login'=>$login,
                                'password'=>$password,
                                'email'=>$email,
                                'firstname'=>$firstname,
                                'lastname'=>$lastname)) ;
        echo 'profil update ok';
        $bdd = null;
    }

    public function isConnected() 
    {

        if ($this->isconnect == 1)
        {echo ' il est bien connecté';}
        else { echo ' is conenected failed';}
        
    }
    public function getAllInfos() 
    {
        $bdd = $this->connection_bdd();
        $this->connect();
        $bdd = null;
        
        echo '<pre>';
        var_dump($this);
        echo '</pre> ';
        
    }
    public function getLogin() 
    {
        $bdd = $this->connection_bdd();
        $this->connect();


        echo '<pre>';
        var_dump($this->login);
        echo '</pre> ';
        
    }
    public function refresh() 
    {
        $bdd = $this->connection_bdd();
        $resultat = $this->connect();


         $this->login = $resultat['login'];
         $this->password=  $resultat['password'];
         $this->email= $resultat['email'];
         $this->firstname=  $resultat['firstname'];
         $this->lastname = $resultat['lastname'];

         echo ' refresh ok';

    }  



}

































?>