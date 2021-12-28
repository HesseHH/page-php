<?php

if ( isset( $_REQUEST['action'] ) ) {
    
    if ( $_REQUEST['action'] == 'user' ) {
        require_once('./users.php');
    }elseif ( $_REQUEST['action'] == 'platform' ) {
        require_once('./platform.html');
    }elseif ( $_REQUEST['action'] == 'modes' ) {
        require_once('./modes.html');
    }elseif ( $_REQUEST['action'] == 'genres' ) {
        require_once('./genres.html');
    }elseif ( $_REQUEST['action'] == 'videogames' ) {
        require_once('./videogames.html');
    }
    
}else {
    require_once('./home_links.html');
}

?>