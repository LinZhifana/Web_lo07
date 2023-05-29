<?php

/**
 * Description of ModelPersonne
 *
 * @author Lin
 */
require_once 'Model.php';

class ModelPersonne {

    // php 版本低于7.1.0 用const
    // 高于7.1.0 可以用public const 
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;

    private static $className = "ModelPersonne";
    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL,
            $adresse = NULL, $login = NULL, $password = NULL,
            $statut = NULL, $specialite_id = NULL) {
        // 对非null才能赋值
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getSpecialite_id() {
        return $this->specialite_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setSpecialite_id($specialite_id) {
        $this->specialite_id = $specialite_id;
    }

    // 辅助函数
    // obtenir le mot de specialite 
    public function getStatutString() {
        switch ($this->statut) {
            case self::ADMINISTRATEUR:
                return "administrateur";
            case self::PRATICIEN:
                return "praticien";
            case self::PATIENT:
                return "patient";
            default:
                return "";
        }
    }

    public static function login($login, $password) {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login = :login AND password= :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, self::$className);
            if (empty($results)) {
                return null;
            } else {
                return $results[0];
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //-------------ADMINISTRATEUR-------------
   public static function getAll($statut) {
        try {
         $database = Model::getInstance();
         $query = "select * from personne where statut = :statut";
         $statement = $database->prepare($query);
         $statement->execute([
                'statut' => $statut
            ]);
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getAllPersonne() {
        try {
         $database = Model::getInstance();
         $query = "select * from personne";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    //-------------PRATICIEN-------------
    // Liste de mes disponibilités
    public static function getAvailableTimes($id) {
        try {
            $database = Model::getInstance();
            $query = "select rendezvous.* "
                    . "from rendezvous "
                    . "join personne on rendezvous.praticien_id = personne.id "
                    . "where rendezvous.patient_id = 0 and rendezvous.praticien_id = :id;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
            // 返回ModelRDV类
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste de mes rendez-vous avec le nom des patients
    public static function showAppointmentsWithPatients($personne) {
        try {
            $database = Model::getInstance();
            $query = "select rendezvous.rdv_date, p2.nom, p2.prenom "
                    . "from personne p1, personne p2, rendezvous "
                    . "where p1.id = :id and p1.id = rendezvous.praticien_id "
                    . "and rendezvous.patient_id = p2.id and rendezvous.patient_id <> 0;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $personne->getId()
            ]);
            $rdvs = $statement->fetchAll(PDO::FETCH_ASSOC);
            // 返回rdv数组
            return $rdvs;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste de mes patients sans doublon
    public static function showUniquePatients($personne) {
        try {
            $database = Model::getInstance();
            $query = "select distinct p2.nom, p2.prenom, p2.adresse "
                    . "from personne p1, personne p2, rendezvous "
                    . "where p1.id = 60 and p1.id = rendezvous.praticien_id "
                    . "and rendezvous.patient_id = p2.id and rendezvous.patient_id <> 0;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $personne->getId()
            ]);
            $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
            // 返回patients数组
            return $patients;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //-------------PATIENT-------------
    // Mon compte
    public static function selectOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where id = :id;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $personnes = $statement->fetchAll(PDO::FETCH_ASSOC);
            // 返回personnes数组
            return $personnes;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Liste de mes rendez-vous
    public static function getAppointments($personne) {
        try {
            $database = Model::getInstance();
            $query = "select rendezvous.rdv_date, p1.nom, p1.prenom "
                    . "from personne p1, personne p2, rendezvous "
                    . "where p2.id = :id and p1.id = rendezvous.praticien_id "
                    . "and rendezvous.patient_id = p2.id and rendezvous.patient_id <> 0;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $personne->getId()
            ]);
            $rdvs = $statement->fetchAll(PDO::FETCH_ASSOC);
            // 返回rdvs数组
            return $rdvs;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Prendre un rendez-vous avec un praticien
    public static function selectPraticien() {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $praticiens = $statement->fetchAll(PDO::FETCH_CLASS, self::$className);
            // 返回ModelPersonne数组
            return $praticiens;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
   

    //inscrirer
    public static function insert($nom, $prenom, $adress,$login,$password,$statut,$specialite_id){
        
         $database = Model::getInstance();

         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from personne";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;

         // ajout d'un nouveau tuple;
         $query = "insert into personne value (:id, :nom, :prenom, :adress,:login,:password,:statut,:specialite_id)";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id,
           'nom' => $nom,
           'prenom' => $prenom,
           'adress' => $adress,
           'login' => $login,
           'password' => $password,
           'statut' => $statut,
           'specialite_id' => $specialite_id
         ]);
         return $id;
        //} 
        
        /*catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }*/

}


 }
?>