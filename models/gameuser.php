<?php

require_once('dbconnection.php');

class Gameuser {

    private $pdo;

    public function __construct() {
        try {
            $this -> pdo = DBConecction::connection();
        } catch ( Exception $e) {
            die( $e -> getMessage() );
        }
    }

    public function insert( $idUser, $idGame ) {
        try {
            
            if ( !($this -> getGamUserCountByData( $idUser, $idGame ) > 0) ) {
                $query = 'INSERT INTO user_videogame(id_user_videogame, user_id_, videogame_id) VALUES (null, ?, ?)';

                $res = $this -> pdo -> prepare( $query );
    
                $res -> execute( array( $idUser, $idGame ) );
    
                echo 'OK';
            }

        } catch ( Exception $e ) {
            echo 'error';
            die( $e -> getMessage() );
        }
    }

    public function getGamUserCountByData( $idUser, $idGame ) {

        try {
            
            $query = 'SELECT * FROM user_videogame WHERE user_id_ = ? AND videogame_id = ?';
            
            $res = $this -> pdo -> prepare( $query );
            $res -> execute(array( $idUser, $idGame ));

            return $res -> fetchColumn();
        
        } catch ( Exception $e ) {
            die( $e -> getMessage() );
        }

    }

    public function delete( $idUser, $idGame ) {
        try {
            
            $query_1 = 'SELECT id_user_videogame FROM user_videogame WHERE user_id_ = ? AND videogame_id = ?';
            $res = $this -> pdo -> prepare( $query_1 );
            $res -> execute(array( $idUser, $idGame ));
            $obj = $res -> fetch( PDO::FETCH_OBJ );

            $query_2 = 'DELETE FROM user_videogame WHERE id_user_videogame = ?';
            $ress = $this -> pdo -> prepare( $query_2 );
            $ress -> execute(array( $obj -> id_user_videogame ));

            echo 'OK';

        } catch ( Exception $e ) {
            die( $e -> getMessage() );
        }
    }

}

?>