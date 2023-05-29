<?php

require_once '../controller/ControllerDoctolib.php';
require_once '../controller/ControllerPraticien.php';
require_once '../controller/ControllerPatient.php';
require_once '../controller/ControllerSpecialite.php';
require_once '../controller/ControllerRDV.php';
require_once '../controller/ControllerAdministrateur.php';
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
// 结构是 函数名 参数
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
    case "login":
    case "logged":
    case "logout":
    case "personneCreated":
    case "innvo1":
    case "innvo2":
        ControllerDoctolib::$action();
        break;
    
    case "showAvailableTimes":
    case "addAvailableTime":
    case "addedAvailableTime":
    case "showAppointmentsWithPatients":
    case "showUniquePatients":
        ControllerPraticien::$action();
        break;
    case "showInfo":
    case "showAppointments":
    case "selectPraticien":
    case "selectAppointment":
    case "updateRDV":
        ControllerPatient::$action();
        break;
    case "specReadAll":
    case "specReadId":
    case "specReadOne":
    case "specCreate":
    case "specCreated":
    case "readAllPraticien":
    case "specReadLabel":
        ControllerSpecialite::$action();
        break;
    case "specCount":
        ControllerRDV::$action();
        break;
    
    case "administrateurInfo":
        ControllerAdministrateur::$action();
        break;
    
    default:
        $action = "DoctolibAccueil";
        ControllerDoctolib::$action();
}
?>