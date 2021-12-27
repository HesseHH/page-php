<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        $a = ['a', 'b', 'c'];

        foreach ($a as $key => $value) {
            echo $value;
        }

        echo "";
    ?>

    <div class="container">

        <div class="p-5">

            <div class="row mb-5">

                <h1 class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing.</h1>
                <h3 class="text-center p-4">Lorem ipsum dolor sit.</h3>
    
                <div class="col-6 text-end">
                    <a href="./views/session/sign_in.php" class="btn btn-primary">Sign In</a>
                </div>
                <div class="col-6 text-start">
                    <a href="#" class="btn btn-primary">Sign Up</a>
                </div>
    
            </div>

        </div>



        <div class="row p-3 m-2">
            <div class="col-6">
                <h2>(1)Lorem ipsum dolor sit amet.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias reiciendis necessitatibus provident quisquam nisi officiis doloremque magnam distinctio blanditiis eum?</p>
            </div>
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium itaque cumque expedita minima consectetur et neque ipsum distinctio fugit consequatur aliquid nulla, optio corporis quo eligendi praesentium tenetur qui totam fugiat unde doloribus voluptates cupiditate libero. Nihil blanditiis magnam placeat?</p>
            </div>
        </div>

        <div class="row p-3 m-2">
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium itaque cumque expedita minima consectetur et neque ipsum distinctio fugit consequatur aliquid nulla, optio corporis quo eligendi praesentium tenetur qui totam fugiat unde doloribus voluptates cupiditate libero. Nihil blanditiis magnam placeat?</p>
            </div>
            <div class="col-6">
                <h2>(2)Lorem ipsum dolor sit amet.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias reiciendis necessitatibus provident quisquam nisi officiis doloremque magnam distinctio blanditiis eum?</p>
            </div>
        </div>

        <div class="row p-3 m-2">
            <div class="col-6">
                <h2>(3)Lorem ipsum dolor sit amet.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias reiciendis necessitatibus provident quisquam nisi officiis doloremque magnam distinctio blanditiis eum?</p>
            </div>
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium itaque cumque expedita minima consectetur et neque ipsum distinctio fugit consequatur aliquid nulla, optio corporis quo eligendi praesentium tenetur qui totam fugiat unde doloribus voluptates cupiditate libero. Nihil blanditiis magnam placeat?</p>
            </div>
        </div>

        <div class="row p-3 m-2">
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium itaque cumque expedita minima consectetur et neque ipsum distinctio fugit consequatur aliquid nulla, optio corporis quo eligendi praesentium tenetur qui totam fugiat unde doloribus voluptates cupiditate libero. Nihil blanditiis magnam placeat?</p>
            </div>
            <div class="col-6">
                <h2>(4)Lorem ipsum dolor sit amet.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias reiciendis necessitatibus provident quisquam nisi officiis doloremque magnam distinctio blanditiis eum?</p>
            </div>
        </div>

        <div class="row p-3 m-2">
            <div class="col-6">
                <h2>(5)Lorem ipsum dolor sit amet.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias reiciendis necessitatibus provident quisquam nisi officiis doloremque magnam distinctio blanditiis eum?</p>
            </div>
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium itaque cumque expedita minima consectetur et neque ipsum distinctio fugit consequatur aliquid nulla, optio corporis quo eligendi praesentium tenetur qui totam fugiat unde doloribus voluptates cupiditate libero. Nihil blanditiis magnam placeat?</p>
            </div>
        </div>

        <hr style="height: 3px;">
        <h2 class="text-center">Lorem ipsum dolor sit amet.</h2>
        <div class="row">
            <div class="col-6 text-end">
                <a href="#" class="btn btn-primary">Sign In</a>
            </div>
            <div class="col-6 text-start">
                <a href="#" class="btn btn-primary">Sign Up</a>
            </div>
        </div>

        <?php require_once('./views/partials/footer.php'); ?>

        <h1>
        adsfas
        <?php
        require_once('./models/user.php');
        $user = new User();
        $data = $user->getUser('usuario3@gmail.com');

        print_r($data->passwd);

        print('<br>');
        print('<br>');
        print('<br>');
        
        $hash = password_hash('usuario4', PASSWORD_DEFAULT, [ 'cost' => 10]);
        
        print($hash);
        print('<br>');

        if (password_verify('usuario4', $hash)) {
            # code...
            print("contraseña correcta");
        }else {

            print("contraseña incorrecta");
        }



        ?>
        </h1>
        
    </div>
    

    <script src="main.js"></script>
</body>
</html>