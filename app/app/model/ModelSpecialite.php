<?php

require_once 'Model.php';

class ModelSpecialite{
    
    private $id,$label;
    
    public function __construct($id = NULL, $label=NULL){
        if(!is_null($id)){
            $this->id = $id;
            $this->label = $label;
        }
    }
     
    function setId($id) {
        $this->id = $id;
    }
    
    function setLabel($label){
        $this->label = $label;
    }
    
    function getId(){
        return $this->id;
    }
    
    function getLabel(){
        return $this->label;
    }
    
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from specialite";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    // retourne une liste des id
    public static function getAllId() {
     try {
      $database = Model::getInstance();
      $query = "select id from specialite";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
      return $results;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
    }
    
    public static function getOne($id) {
        try {
         $database = Model::getInstance();
         $query = "select * from specialite where id = :id";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function insert($label) {
        try {
         $database = Model::getInstance();

         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from specialite";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;

         // ajout d'un nouveau tuple;
         $query = "insert into specialite value (:id, :label)";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id,
           'label' => $label
         ]);
         return $id;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
    }
    
    public static function getPraticiens(){
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.id, personne.nom,personne.prenom,personne.adresse,specialite.label FROM personne,specialite WHERE personne.specialite_id = specialite.id AND personne.statut = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $cols = array("id","nom","prenom","adresse","label");
            $datas = array();
             while ($row = $statement->fetch()) {
                array_push($datas, $row);
            }
            return array($cols, $datas);
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
     // retourne une liste des label
    public static function getAllLabel() {
     try {
      $database = Model::getInstance();
      $query = "select label from specialite";
      $statement = $database->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_COLUMN, "label");
      return $results;
     } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
     }
    }
}
