<?php

class ModelPersonne{
   
    
    public const ADMINISTRATEUR = 0;
    public const PRATICIEN = 1;
    public const PATIENT = 2;
    
    
    private $id,$nom,$prenom,$adress,$login,$password,$statut,$specialite_id;
    public function __construct($id = NULL,$nom = NULL,$prenom = NULL,$adress = NULL,$login = NULL,
            $password = NULL,$statut = NULL,$specialite_id = NULL){
        if(!is_null($id)){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adress = $adress;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
        }
    }
    
    
    function getId(){
        return $this->id;
    }
    
    function getNom(){
        return $this->nom;
    }
    
    function getPrenom(){
        return $this->prenom;
    }
    
    function getAdress(){
        return $this->adress;
    }
    
    function getLogin(){
        return $this->login;
    }
    
    function getPassword(){
        return $this->password;
    }
    function getStatut(){
        return $this->statut;
    }
    
    function getSpecialite_id(){
        return $this->specialite_id;
    }
    /*
    function getStatusString(){
        if(self::getStatut() == 0){
            return "ADMINISTRATEUR";
        }elseif (self::getStatut() == 1) {
            return "PRATICIEN";
        }elseif(self::getStatut() == 2){
            return "PATIENT";
        }
    }*/
    
    public static function readOne($login) {
          try {
           $database = Model::getInstance();
           $query = "select * from personne where login = :login";
           $statement = $database->prepare($query);
           $statement->execute([
             'login' => $login
           ]);
           $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
           return $results;
          } catch (PDOException $e) {
           printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
           return NULL;
          }
    }
 
 
}
?>

