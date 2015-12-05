<?php

class genreManager extends genre {

    private $_db;
    private $_accueilArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getGenre(array $data) {
        $query = "SELECT * FROM Genre";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new Accueil($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

}

?>