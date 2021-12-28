<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../partials/header.php'); ?>

    <title>Document</title>
</head>
<body class="">

    <div class="container w-50 mt-5">
        <h1 class="text-center">Sign Up</h1>

        <div class="card">
            <div class="card-body">    

                <label for="username">Username:</label>
                <input class="form-control mb-4" type="text" id="username">
        
                <label for="email">Email:</label>
                <input class="form-control mb-4" type="text" id="email">
                
                <label for="age">Age:</label>
                <input class="form-control mb-4" type="text" id="age">
        
                <label for="passwd">Password:</label>
                <input class="form-control mb-4" type="password" id="passwd">
        
                <label for="passwd_comfirm">Comfirm password:</label>
                <input class="form-control mb-4" type="password" id="passwd_comfirm">

                <button class="btn btn-primary w-100" id="sign_up">Sign Up</button>

                <a href="./sign_in.php" class="d-block text-center mt-3">Login</a>

            </div>
        </div>
    </div>

    <script>
        const signUp = document.getElementById('sign_up');

        signUp.addEventListener('click', () => {

            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const age = document.getElementById('age').value;
            const passwd = document.getElementById('passwd').value;
            const confirm_passwd = document.getElementById('passwd_comfirm').value;

            if ( !(username === '' ) && !(email === '' ) && !(age === '' ) && !(passwd === '' ) && !(confirm_passwd === '' ) ) {
                if ( passwd === confirm_passwd ) {
                    const formData = new FormData();

                    formData.append('username', username);
                    formData.append('email', email);
                    formData.append('age', age);
                    formData.append('password', passwd);
                    formData.append('action', '2');

                    const request = new XMLHttpRequest();
                    request.open('POST', '../../controllers/user.controller.php', true);
                    request.onreadystatechange = function(e) {
                        if (request.readyState == 4) {
                            if (request.status == 200) {
                                if ((request.responseText === 'OK')) {
                                    // alert(request.responseText);
                                    window.location.href = './sign_in.php';
                                } else {
                                    console.log('fallo');
                                }
                            }
                        }
                    }
                    request.send(formData);
                }else {
                    alert('Passwords do not match');
                }
            }else {
                alert('Fill in all fields');
            }
        })
    </script>
    
<?php require_once('../partials/footer.php'); ?>