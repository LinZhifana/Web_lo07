<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ControllerPatient
 *
 * @author Lin
 */
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';
class ControllerPatient {
    // Mon compte
    public static function showInfo() {
        session_start();
        $personne = $_SESSION['login'];
        include 'config.php';
        $vue = $root . '/app/view/patient/viewShowInfo.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }
    // Liste de mes rendez-vous
    public static function showAppointments() {
        session_start();
        $personne = $_SESSION['login'];
        $rdvs = ModelPersonne::getAppointments($personne);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewShowAppointments.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }
    // Prendre un rendez-vous avec un praticien
    public static function selectPraticien() {
        session_start();
        $personne = $_SESSION['login'];
        $praticiens = ModelPersonne::selectPraticien();
        include 'config.php';
        $vue = $root . '/app/view/patient/viewSelectPraticien.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }
    
    public static function selectAppointment(){
        session_start();
        $personne = $_SESSION['login'];
        $rdvs = ModelPersonne::getAvailableTimes($_GET['praticien']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewSelectAppointment.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }
    
    public static function updateRDV(){
        session_start();
        $personne = $_SESSION['login'];
        ModelRDV::update($_GET['rdv'], $personne->getId());
        $praticiens = ModelPersonne::selectPraticien();
        $rdvs = ModelPersonne::getAppointments($personne);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewUpdatedAppointment.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }
}
?>