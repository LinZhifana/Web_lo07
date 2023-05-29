<?php

require_once '../model/ModelRDV.php';

class ControllerRDV{
    
     public static function specCount() {
        session_start();
        $personne = $_SESSION['login'];
        $statement = ModelRDV::count();
        include 'config.php';
        $vue = $root . '/app/view/RDV/viewRDV.php';
        if (DEBUG) {
           echo ("ControllerRDV : specCount : vue = $vue");
        }
        require ($vue);
    }
}

