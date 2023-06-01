<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/Model.php';
class ControllerSpecialite{
    
    
    public static function specReadAll(){
        session_start();
        $personne = $_SESSION['login'];
        $results = ModelSpecialite::getAll();
        
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAll.php';
        
        if (DEBUG)
         echo ("ControllerSpecialite : specReadAll : vue = $vue");
        require ($vue);
    }
    
    // Affiche un formulaire pour sélectionner un id qui existe
    public static function specReadId() {
        session_start();
        $personne = $_SESSION['login'];
        $results = ModelSpecialite::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewId.php';
        require ($vue);
    }
    
    // Affiche un vin particulier (id)
    public static function specReadOne() {
        session_start();
        $personne = $_SESSION['login'];
        $spec_id = $_GET['id'];
        $results = ModelSpecialite::getOne($spec_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAll.php';
        require ($vue);
    }
    
    
    
    public static function specCreate() {
        session_start();
        $personne = $_SESSION['login'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewInsert.php';
        require ($vue);
     }
     
     
    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function specCreated() {
        session_start();
        $personne = $_SESSION['login'];
        // ajouter une validation des informations du formulaire
        $results = ModelSpecialite::insert(
            htmlspecialchars($_GET['label'])
        );
        /*
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewAll.php';
        require ($vue);*/
        self::specReadAll();
    }
    
    public static function readAllPraticien(){
        session_start();
        $personne = $_SESSION['login'];
        $results = ModelSpecialite::getPraticiens();
        include 'config.php';
        $vue = $root . '/app/view/specialite/viewPraticien.php';
        if (DEBUG)
         echo ("ControllerSpecialite : readAllPraticien : vue = $vue");
        require ($vue);
       }
       
    public static function specReadLabel() {
        session_start();
        $personne = $_SESSION['login'];
        $results = ModelSpecialite::getAllLabel();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/site/viewInscrire.php';
        require ($vue);
    }
    
    
}
