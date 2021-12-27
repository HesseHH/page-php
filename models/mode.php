<?php

require_once('dbconnection.php');

class Mode {

    private $pdo;

    public function __construct() {
        try {
            $this -> pdo = DBConecction::connection();
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

    public function getModeLimit( $limit ) {
        try {
            $query = 'SELECT * FROM mode LIMIT '.$limit;

            $res = $this -> pdo -> prepare( $query );
            $res -> execute();

            return $res -> fetchAll( PDO::FETCH_OBJ );
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

}

?>