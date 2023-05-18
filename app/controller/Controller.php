<?php
require_once '../model/ModelPersonne.php';
require_once '../model/Model.php';


class Controller{
    
   
    public static function readOne() {
     $login = $_GET['login'];
     $results = ModelPersonne::readOne($login);
     // ----- Construction chemin de la vue
    include 'config.php';
     $vue = $root . '/app/view/viewDoctolibAccueil.php';
     //$vue = $root . '/app/view/site/viewSauter.php';
     require ($vue);
    }
}
