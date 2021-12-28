<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Edit User</h1>

    <?php

    $idUser = $_REQUEST['id'];

    require_once('../../models/user.php');

    $userObj = new User();

    $user = $userObj -> getUserById( $idUser );

    ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>ID: <?php echo $user -> id; ?></h2>
            </div>

            <div class="card-body">
                <div class="d-flex mb-3">
                    <h2>Name:</h2>
                    <input type="text" value="<?php echo $user -> username; ?>" id="username" class="form-control ms-3">
                </div>

                <div class="d-flex mb-3">
                    <h2>Email:</h2>
                    <input type="text" value="<?php echo $user -> email; ?>" id="email" class="form-control ms-3">
                </div>

                <div class="d-flex mb-3">
                    <h2>Age:</h2>
                    <input type="text" value="<?php echo $user -> age; ?>" id="age" class="form-control ms-3">
                </div>

                <div class="d-flex mb-3">
                    <h2 class="_inline">Password:</h2>
                    <input type="text" id="passwd" class="form-control ms-3">
                </div>

                <button class="btn btn-primary _margin mt-3" id="confirm">Confirm modification</button>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary _margin" id="cancel">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        const confirm = document.getElementById('confirm');
        const cancel = document.getElementById('cancel');

        confirm.addEventListener('click', () => {
            const idUser = '<?php echo $user -> id; ?>';
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const age = document.getElementById('age').value;
            const passwd = document.getElementById('passwd').value;

            const formData = new FormData();

            formData.append('id', idUser);
            formData.append('username', username);
            formData.append('email', email);
            formData.append('age', age);
            formData.append('password', passwd);
            formData.append('action', '3');

            const request = new XMLHttpRequest();
            request.open('POST', '../../controllers/user.controller.php', true);
            request.onreadystatechange = function(e) {
                if (request.readyState == 4) {
                    if (request.status == 200) {
                        if ((request.responseText === 'OK')) {
                            window.location.href = 'users.php';
                        } else {
                            console.log('fallo');
                        }
                    }
                }
            }
            request.send(formData);
        });

        cancel.addEventListener('click', () => {
            window.location.href = './users.php';
        });
    </script>
</body>
</html>