<!DOCTYPE html>
<html>
<head>

    <?php require_once('../partials/header.php'); ?>

    <title>Login</title>
</head>
<body>

    <div class="container w-35 animate__animated animate__fadeIn">

        <h2 class="text-center">WELCOME TO LOGIN</h2>
        
        <div class="card">
            <div class="card-body">
                <form action="./sign_in.php" method="POST">
                    <label for="email">Email</label>
                    <input class="form-control mb-3" type="email" name="email" id="email">
                    
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" id="password">

                    <input class="form-control btn btn-primary mt-4" type="submit" value="Login">
                </form>

                <a href="" class="d-block text-center mt-2">Recuperar contraseña</a>
                <a href="./sign_up.php" class="d-block text-center mt-2">Sign up</a>
            </div>
        </div>

    </div>

    <div class="animate__animated animate__fadeIn">
        <?php require_once('../partials/footer.php'); print(__DIR__) ?>
    </div>

<?php

    require_once('../../helpers/validation.php');

    // TODO verificar que las password que se pasa a validation es proveninete de la base de datos

    $validation_obj = new Validation();
    if ($validation_obj->validation( $_POST['email'], $_REQUEST['password'] )) {
        print('Login exitoso');
        print($validation_obj->validation( $_POST['email'], $_REQUEST['password'] ));
    }else {
        print('Login incorrecto'."<br>");
        print($_REQUEST['email']."<br>");
        print($_REQUEST['password']."<br>");
        print($_REQUEST['password']."<br>");
    }

?>
    