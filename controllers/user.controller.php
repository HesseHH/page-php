<?php

$action = $_POST['action'];

require_once('../models/user.php');

$user = new User();

if ( $action == '1' ) {
    $idUser = $_POST['user'];
    $user -> deleteUser( $idUser );
}elseif ( $action == '2' ) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $passwd = $_POST['password'];

    $user_ = new User();

    $user_ -> username = $username;
    $user_ -> email = $email;
    $user_ -> age = $age;
    $user_ -> password = $passwd;

    $user_ -> saveUser( $user_ );

}elseif ( $action == '3' ) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $passwd = $_POST['password'];

    $user_obj = new User();

    $user_obj -> id = $id;
    $user_obj -> username = $username;
    $user_obj -> email = $email;
    $user_obj -> age = $age;
    $user_obj -> password = $passwd;

    $user_obj -> updateUser( $user_obj );
}



?>