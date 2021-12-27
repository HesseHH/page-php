<?php

require_once('dbconnection.php');

class Videogame {

    private $pdo;

    public $name, $released, $image;

    function __construct() {
        try {
            $this->pdo = DBConecction::connection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getGameLimit( $limit ) {
        try {
            
            $query = 'SELECT * FROM videogame LIMIT '.$limit;

            $res = $this -> pdo -> prepare( $query );
            $res -> execute();

            return $res -> fetchAll( PDO::FETCH_OBJ );

        } catch ( Exception $e ) {
            die( $e -> getMessage() );
        }
    }
}

?>