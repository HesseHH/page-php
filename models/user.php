<?php

require('dbconnection.php');

class User {

    private $pdo;

    public $id, $username, $email, $age, $password;

    function __construct() {
        try {
            $this->pdo = DBConecction::connection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllUsers() {
        try {

            $sql = "SELECT * FROM users";

            $res = $this->pdo->prepare( $sql );
            $res->execute();

            return $res->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUser( $emailUser ) {

        try {

            $sql = "SELECT * FROM users WHERE email = ?";
            
            $res = $this->pdo->prepare( $sql );
            $res->execute(array( $emailUser ));

            return $res->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function getUserById( $idUser ) {

        try {

            $sql = "SELECT * FROM users WHERE id = ?";
            
            $res = $this->pdo->prepare( $sql );
            $res->execute(array( $idUser ));

            return $res->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function saveUser( User $data ) {

        try {

            $sql = "INSERT INTO users(id, username, email, age, passwd, rol) VALUES(null, ?, ?, ?, ?, ?)";
            
            $res = $this->pdo->prepare( $sql );

            $hash = password_hash( $data->password, PASSWORD_BCRYPT, [ 'cost' => 12 ] );

            $res->execute(array( $data->username, $data->email, $data->age, $hash, 'user' ));

            echo 'OK';

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function updateUser( User $data ) {

        try {
            
            $sql = "UPDATE users SET username = ?, email = ?, age = ?, passwd = ? WHERE id = ?";

            $res = $this->pdo->prepare( $sql );

            $hash = password_hash( $data->password, PASSWORD_BCRYPT, [ 'cost' => 12 ] );

            $res->execute(array( $data->username, $data->email, $data->age, $hash, $data->id ));

            echo 'OK';

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function deleteUser( $idUser ) {

        try {
            
            $sql = "DELETE FROM users WHERE id = ?";

            $res = $this->pdo->prepare( $sql );
            $res->execute(array( $idUser ));

            echo 'OK';

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    // public function list() {
    //     mysqli_connect('127.0.0.1', 'root', '', 'ev4');

    //     $query = "SELECT * FROM users";

    //     $result = mysqli_query( new mysqli(), $query );

    //     if ( $result ) {
    //         while ( $row = mysqli_fetch_array( $result ) ) {
    //             $name = $row["username"];
    //             echo "Nombre: ".$name."<br>";
    //         }
    //     }
    // }


    public function signIn( $email_, $passwd_ ) {
    
        $user = $this -> getUser( $email_ );

        if ( $user ) {
            if ( password_verify( $passwd_, $user -> passwd ) ) {
                session_start();
    
                $_SESSION['id'] = $user -> id;
                $_SESSION['name'] = $user -> username;
                $_SESSION['age'] = $user -> age;
                $_SESSION['rol'] = $user -> rol;
    
                if ( $_SESSION['rol'] == 'admin' ) {
                    echo '../admin/home.html';
                }else if( $_SESSION['rol'] == 'user' ) {
                    echo '../user/home.php';
                }
    
            }else {
                echo 'error_login';
            }
        }else {
            echo 'error_login';
        }

    }
}


?>