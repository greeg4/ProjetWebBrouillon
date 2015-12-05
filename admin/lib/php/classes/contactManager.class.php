<?php

class contactManager extends contact {

    private $_db;
    private $_contactArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function addContact(array $data) {
        $query = "select addContact(:type,:nomCl,:prenomCl,:comCl) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);

            $statement->bindValue(1, $data['type'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['nomCl'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['prenomCl'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['comCl'], PDO::PARAM_STR);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion: " . $e;
            $retour = 0;
            return $retour;
        }
    }

    private function checkEmpty($data) {
        return true;
    }

}
