<?php

class seConnecter {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    function estAdmin($login, $password) {
        $ret = array();
        try {
            $query = 'select verif_cnx(:nomadmin,:mpadmin) ad ret';
            $sql = $this->prepare($query);
            $sql->bindValue(':nomadmin', $_POST['login']);
            $sql->bindValue(':mpadmin', $_POST['password']);
            $sql->execute();
            $ret = $sql->fetchColum(0);
        } catch (PDOException $e) {
            print "Echec: " . $e;
        }
        return $ret;
    }

}
?>