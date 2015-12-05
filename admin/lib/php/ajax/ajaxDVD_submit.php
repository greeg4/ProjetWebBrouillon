<?php

header('Content-Type: application/json'); // retour géré par json

require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/ajoutDVD.class.php';
require '../classes/ajoutDVDManager.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new ajoutDVDManager($db);
    $retour = $mg->addDVD($_GET);
    print json_encode(array('retour' => retour));
} catch (PDOException $e) {
    
}
?>