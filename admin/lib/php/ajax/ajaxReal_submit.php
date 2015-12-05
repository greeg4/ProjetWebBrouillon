<?php

header('Content-Type: application/json'); // retour géré par json

require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/ajoutReal.class.php';
require '../classes/ajoutRealManager.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new ajoutRealManager($db);
    $retour = $mg->addReal($_GET);
    print json_encode(array('retour' => retour));
} catch (PDOException $e) {
    
}
?>