<?php

require_once('dbconnection.php');

class Platform {

    private $pdo;

    public function __construct() {
        try {
            $this -> pdo = DBConecction::connection();
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

    public function getPlatformLimit( $limit ) {
        try {
            $query = 'SELECT * FROM platform LIMIT '.$limit;

            $res = $this -> pdo -> prepare( $query );
            $res -> execute();

            return $res -> fetchAll( PDO::FETCH_OBJ );
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

}

?>