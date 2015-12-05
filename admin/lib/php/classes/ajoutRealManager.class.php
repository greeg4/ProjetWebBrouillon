<?php

class ajoutRealManager extends ajoutReal {

    private $_db;
    private $_contactArray = array();

    public function __construct(array $data) {
        $query = "select addReal(:nomReal) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['idReal'], PDO::PARAM_INT);
            $statement->execute();
            $retour = $statement->fetchColum(0);
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
