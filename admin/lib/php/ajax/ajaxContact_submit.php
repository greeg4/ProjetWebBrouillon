<?php

header('Content-Type: application/json'); // retour géré par json

require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/contact.class.php';
require '../classes/contactManager.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new contactManager($db);
    $retour = $mg->addContact($_GET);
    print json_encode(array('retour' => retour));
} catch (PDOException $e) {
    
}
?>