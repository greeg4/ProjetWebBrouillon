<?php

header('Content-Type: application/json'); // retour géré par json

require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/seConnecter.class.php';

$db = Connexion::getInstance($dsn, $user, $pass);

try {
    $mg = new seConnecter($db);
    $ret = $mg->estAdmin($_POST['login'], $_POST['password']);
    if ($ret == 1) {
        $_SESSION['admin'] = 1;
        $_SESSION['page'] = "accueil";
    }
    print json_encode(array('ret' => ret));
} catch (PDOException $e) {
    
}
?>