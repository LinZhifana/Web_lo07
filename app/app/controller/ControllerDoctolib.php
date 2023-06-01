<?php

require_once '../model/ModelPersonne.php';

class ControllerDoctolib {

    // --- page d'acceuil
    public static function doctolibAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }

    public static function menuItem($modelPersonne) {
        include 'config.php';
        switch ($modelPersonne->getStatut()) {
            case ModelPersonne::ADMINISTRATEUR :
                $vue = $root . '/app/view/fragment/menuAdmin.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem:ADMINISTRATEUR = $vue");
                require ($vue);
                break;
            case ModelPersonne::PRATICIEN :
                $vue = $root . '/app/view/fragment/menuPraticien.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem:PRATICIEN = $vue");
                require ($vue);
                break;
            case ModelPersonne::PATIENT:
                $vue = $root . '/app/view/fragment/menuPatient.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem:PATIENT = $vue");
                require ($vue);
                break;
            default:
                break;
        }
    }

    public static function login() {
        include 'config.php';
        $vue = $root . '/app/view/site/viewLogin.php';
        require ($vue);
    }

    public static function logged() {
        session_start();
        $personne = ModelPersonne::login(htmlspecialchars($_GET['login']),
                        htmlspecialchars($_GET['password']));
        $_SESSION['login'] = $personne;
        include 'config.php';
        if (!empty($personne)) {
            $vue = $root . '/app/view/viewDoctolibAccueil.php';
        } else {
            echo '<script>alert("The username or password is incorrect!");</script>';
            $vue = $root . '/app/view/site/viewLogin.php';
        }
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }

    public static function logout() {
        session_start();
        unset($_SESSION['login']);
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function personneReadAll(){
        $results = ModelPersonne::getAllPersonne();
        
        include 'config.php';
        $vue = $root . '/app/view/site/viewInserted.php';
        
        if (DEBUG)
         echo ("ControllerDoctolib : personneReadAll : vue = $vue");
        require ($vue);
    }
    
    public static function personneCreated() {
     // ajouter une validation des informations du formulaire
     $results = ModelPersonne::insert(
             htmlspecialchars($_GET['nom']), 
             htmlspecialchars($_GET['prenom']), 
             htmlspecialchars($_GET['adress']),
             htmlspecialchars($_GET['login']), 
             htmlspecialchars($_GET['password']),
             htmlspecialchars($_GET['statut']),
             htmlspecialchars($_GET['specialite_id'])
             );
     // ----- Construction chemin de la vue
     self::personneReadAll();
    }
    
     public static function innvo1() {
        include 'config.php';
        $vue = $root . '/app/view/site/viewInnov1.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : viewInnvo1 : vue = $vue");
        }
        require ($vue);
    }
    
    public static function innvo2() {
        include 'config.php';
        $vue = $root . '/app/view/site/viewInnov2.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : innvo2 : vue = $vue");
        }
        require ($vue);
    }
}



?>