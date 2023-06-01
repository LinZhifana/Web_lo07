<?php

/**
 * Description of ModelRDV
 *
 * @author Lin
 */
require_once 'Model.php';

class ModelRDV {

    private $id, $patient_id, $praticien_id, $rdv_date;
    private static $className = "ModelRDV";

    public function __construct($id = null, $patient_id = null,
            $praticien_id = null, $rdv_date = null) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getPatient_id() {
        return $this->patient_id;
    }

    public function getPraticien_id() {
        return $this->praticien_id;
    }

    public function getRdv_date() {
        return $this->rdv_date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPatient_id($patient_id) {
        $this->patient_id = $patient_id;
    }

    public function setPraticien_id($praticien_id) {
        $this->praticien_id = $praticien_id;
    }

    public function setRdv_date($rdv_date) {
        $this->rdv_date = $rdv_date;
    }

    public function getDate() {
        $array = explode(" à ", $this->rdv_date);
        return $array[0];
    }

    public function getHour() {
        $array = explode(" à ", $this->rdv_date);
        return $array[1];
    }
    // Ajout de nouvelles disponibilités
    public static function insert($patient_id, $praticien_id, $rdv_date) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into rendezvous value (:id, :patient_id, :praticien_id, :rdv_date)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'patient_id' => $patient_id,
                'praticien_id' => $praticien_id,
                'rdv_date' => $rdv_date
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function selectOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, self::$className);
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function selectMany($ids) {
        try {
            $rdvs = array();
            if (is_array($ids)) {
                $database = Model::getInstance();
                $query = "select * from rendezvous where id = :id";
                foreach ($ids as $id) {
                    $statement = $database->prepare($query);
                    $statement->execute([
                        'id' => $id
                    ]);
                    $results = $statement->fetchAll(PDO::FETCH_CLASS, self::$className);
                    array_push($rdvs, $results[0]);
                }
            }
            return $rdvs;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function update($id, $patient_id){
        try {
            $database = Model::getInstance();
            $query = "update rendezvous set patient_id = :patient_id where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'patient_id' => $patient_id
            ]);
            $rowCount = $statement->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function count() {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.nom,personne.prenom,COUNT(rendezvous.praticien_id) FROM personne,rendezvous WHERE personne.id = rendezvous.patient_id GROUP BY rendezvous.patient_id";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "select * from rendezvous";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
}

?>