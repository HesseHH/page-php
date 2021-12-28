<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title>Users</title>
</head>

<body>
    <h1 class="text-center">Users</h1>

    <?php

    require_once('../../models/user.php');

    $user = new User();

    $users = $user->getAllUsers();

    ?>

    <div class="container" style="padding: 0px;">
        <?php

        foreach ($users as $key => $value) {
            echo '<div class="card mb-5">
                <div class="card-header">
                    <h2 class= "text-center">ID: '.$value -> id.'</h2>
                </div>
                <div class="card-body">
                    <h2>Name: '.$value -> username.'</h2>
                    <h2>Email: '.$value -> email.'</h2>
                    <h2>Age: '.$value -> age.'</h2>
                    <h2>Password: '.$value -> passwd.'</h2>

                    <a href="./user_edit.php?id='.$value -> id.'" class="btn btn-primary _margin mt-5">Modificar</a>
                </div>
                <div class="card-footer">
                    <button id="'.$value -> id.'" class="btn btn-primary _margin _x">Eliminar</button>
                </div>
              </div>';
        }

        ?>
    </div>

    <script>
        const btnDelete = document.querySelectorAll('._x');

        btnDelete.forEach( (btn, i) => {
            btnDelete[i].addEventListener('click', () => {
                const idUser = btnDelete[i].getAttribute( 'id' );

                const formData = new FormData();

                formData.append('user', idUser);
                formData.append('action', '1');

                const request = new XMLHttpRequest();
                request.open('POST', '../../controllers/user.controller.php', true);
                request.onreadystatechange = function(e) {
                    if (request.readyState == 4) {
                        if (request.status == 200) {
                            if ((request.responseText === 'OK')) {
                                // alert(request.responseText);
                            } else {
                                console.log('fallo');
                            }
                        }
                    }
                }
                request.send(formData);
            });
        });
    </script>
</body>
</html>