<?php

$id_user = $_POST['user'];
$id_game = $_POST['game'];
$action = $_POST['action'];

if ( !empty( $id_user ) && !empty( $id_game ) ) {

    require_once('../models/gameuser.php');
    $gameUser_object = new Gameuser();
    
    if ( $action == '1' ) {

        $gameUser_object -> insert( $id_user, $id_game );
    }elseif ( $action == '2' ) {
        $gameUser_object -> delete( $id_user, $id_game );
    }

}else {
    echo 'error';
}

?>