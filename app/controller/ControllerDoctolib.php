<?php

class ControllerDoctolib{
    // --- page d'acceuil
    public static function doctolibAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    
}

