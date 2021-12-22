<?php

class DBConecction {

    public static function connection() {
        $pdo = new PDO('mysql:host=localhost;dbname=ev4;charset=utf8', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}

?>