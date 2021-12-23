<?php

$email = $_POST['email'];
$passwd = $_POST['password'];

if ( !empty( $user ) || !empty( $passwd ) ) {

    // echo 'error';
    
    require_once('../models/user.php');

    $user = new User();

    $user -> signIn( $email, $passwd );

    // header('Location: apsojdpa');

}else { echo 'error'; }

?>