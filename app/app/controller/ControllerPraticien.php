<?php

/**
 * Description of ControllerPraticien
 *
 * @author Lin
 */
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerPraticien {

    // Liste de mes disponibilités
    public static function showAvailableTimes() {
        session_start();
        $personne = $_SESSION['login'];
        $rdvs = ModelPersonne::getAvailableTimes($personne->getId());
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewShowAvailableTimes.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }

    // Ajout de nouvelles disponibilités
    public static function addAvailableTime() {
        session_start();
        $personne = $_SESSION['login'];
        $rdvs = ModelPersonne::getAvailableTimes($personne->getId());
        $dates = array();
        foreach ($rdvs as $value) {
            array_push($dates, $value->getDate());
        }
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAddAvailableTime.php';
        require($vue);
    }

    public static function addedAvailableTime() {
        session_start();
        $personne = $_SESSION['login'];
        $date = $_GET['date'] . " à ";
        $ids = array();
        for ($i = 0; $i < $_GET['number']; $i++) {
            $hour = $i + 10;
            $dateRDV = $date . $hour . "h00";
            array_push($ids, ModelRDV::insert(0,
                            htmlspecialchars($personne->getId()), htmlspecialchars($dateRDV)));
        }
        $rdvs = ModelRDV::selectMany($ids);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAddedAvailableTime.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }

    // Liste de mes rendez-vous avec le nom des patients
    public function showAppointmentsWithPatients() {
        session_start();
        $personne = $_SESSION['login'];
        $rdvs = ModelPersonne::showAppointmentsWithPatients($personne);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewShowAppointmentsWithPatients.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }

    // Liste de mes patients sans doublon
    public function showUniquePatients() {
        session_start();
        $personne = $_SESSION['login'];
        $patients = ModelPersonne::showUniquePatients($personne);
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewShowUniquePatients.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require($vue);
    }

}

?>
