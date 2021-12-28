<!DOCTYPE html>
<html>

<head>

    <?php require_once('../partials/header.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Login</title>
</head>

<body>

    <div class="container w-35 animate__animated animate__fadeIn">

        <h2 class="text-center">WELCOME TO LOGIN</h2>

        <div class="card">
            <div class="card-body">
                <label for="email">Email</label>
                <input class="form-control mb-3" type="email" name="email" id="email">

                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">

                <input class="form-control btn btn-primary mt-4" type="button" id="login" value="Login">

                <a href="" class="d-block text-center mt-2">Recuperar contraseña</a>
                <a href="./sign_up.php" class="d-block text-center mt-2">Sign up</a>
            </div>
        </div>

    </div>

    <div class="animate__animated animate__fadeIn">
    </div>
    <?php require_once('../partials/footer.php');?>

 