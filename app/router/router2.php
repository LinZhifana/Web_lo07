<?php

require ('../controller/ControllerDoctolib.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
$action = $param["action"];
unset($param["action"]);
$arg = $param;
// --- Liste des méthodes autorisées
switch ($action){
   
    
  
  default:
  $action = "DoctolibAccueil";
  ControllerDoctolib::$action($arg);

}

