<?php

require_once('../models/user.php');

class UserController {

    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function getData() {
        $user = new User();

        if ( isset( $_REQUEST['idUser'] ) ) {
            $user = $this->model->getUser( $_REQUEST['idUser'] );
        }

        
    }
}

?>