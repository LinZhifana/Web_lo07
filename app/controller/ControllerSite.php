<?php

require_once '../model/ModelPersonne.php';
require_once '../model/Model.php';

class ControllerSite{
   
    public static function login(){
      include 'config.php';
      $vue = $root . '/app/view/site/viewLogin.php';
      require ($vue);
    }
    
    
    
    public static function menuItem($modelPersonne) {
        include 'config.php';
        switch ($modelPersonne->getStatus()) {
            case ModelPersonne::ADMINISTRATEUR :
                $vue = $root . '/app/view/menu/menuAdmin.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem = $vue");
                require ($vue);
                break;
            case ModelPersonne::PRATICIEN :
                $vue = $root . '/app/view/menu/menuPraticien.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem = $vue");
                require ($vue);
                break;
                break;
            case ModelPersonne::PATIENT:
                $vue = $root . '/app/view/menu/menuPatient.html';
                if (DEBUG)
                    echo ("ControllerSite:menuItem = $vue");
                require ($vue);
                break;
        }
    }
}


