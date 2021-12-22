<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../partials/header.php'); ?>

    <title>Document</title>
</head>
<body class="">

    <div class="container w-50 mt-5">
        <h1 class="text-center">Bienvenido al registro</h1>

        <div class="card">
            <div class="card-body">    
                
                <form action="">

                    <label for="username">Username:</label>
                    <input class="form-control mb-4" type="text" name="username" id="username">
            
                    <label for="email">Email:</label>
                    <input class="form-control mb-4" type="text" name="email" id="email">
                    
                    <label for="age">Age:</label>
                    <input class="form-control mb-4" type="text" name="age" id="age">
            
                    <label for="passwd">Password:</label>
                    <input class="form-control mb-4" type="text" name="passwd" id="passwd">
            
                    <label for="passwd_comfirm">Comfirm password:</label>
                    <input class="form-control mb-4" type="text" name="passwd_comfirm" id="passwd_comfirm">

                    <input type="submit" value="Sign In" class="btn btn-primary w-100">

                </form>

                <a href="" class="d-block text-center mt-3">Login</a>

            </div>
        </div>
    </div>
    
<?php require_once('../partials/footer.php'); ?>