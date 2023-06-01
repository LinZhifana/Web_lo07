<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';
require_once '../model/Model.php';

class ControllerAdministrateur{
    
    public static function administrateurInfo(){
        session_start();
        $personne = $_SESSION['login'];
        $results_spec = ModelSpecialite::getAll();
        $results_admi = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
        $results_praticien = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        $results_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
        $results_rendezvous = ModelRDV::getAll();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInfo.php';
        require ($vue);
    }
}
