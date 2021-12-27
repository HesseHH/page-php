<?php

require_once('dbconnection.php');

class Genre {

    private $pdo;

    public function __construct() {
        try {
            $this -> pdo = DBConecction::connection();
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

    public function getGenreLimit( $limit ) {
        try {
            $query = 'SELECT * FROM genre LIMIT '.$limit;

            $res = $this -> pdo -> prepare( $query );
            $res -> execute();

            return $res -> fetchAll( PDO::FETCH_OBJ );
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

}

?>