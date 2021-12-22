<?php

require_once "C:\\xampp\htdocs\PCW-Evaluacion4\models\user.php";

class Validation {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function validation( $email, $passwd ) {
        if ( isset($email) && isset($passwd) ) {
    
            $user = new User();
        
            $user = $this->model->getUser( $email );

            $passwd_hash = $user->passwd;

            if ( password_verify( $email, $passwd_hash ) ) {
                return true;
            }else {
                return false;
            }
        
        }
    }
}

?>