<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title>Home</title>
</head>

<body>

    <nav>
        <div class="row m-1">
            <div class="col-3 text-center">
                <a href="">Game</a>
            </div>
            <div class="col-3 text-center">
                <a href="">Platform</a>
            </div>
            <div class="col-3 text-center">
                <a href="">Genres</a>
            </div>
            <div class="col-3 text-center">
                <a href="">Modes</a>
            </div>
            <div class="col-3 text-center">
                <a href="../../controllers/logout.controller.php" class="btn btn-primary mt-5">Log out</a>
            </div>
        </div>
    </nav>

    <div class="p-5">

        <?php

        require_once('../../models/videogame.php');
        require_once('../../models/platform.php');
        require_once('../../models/genre.php');
        require_once('../../models/mode.php');
        require_once('../../models/gameuser.php');

        $game = new Videogame();
        $platform = new Platform();
        $genre = new Genre();
        $mode = new Mode();
        $gameuser = new Gameuser();

        $games = $game->getGameLimit(4);
        $platforms = $platform->getPlatformLimit(4);
        $genres = $genre->getGenreLimit(4);
        $modes = $mode->getModeLimit(4);

        session_start();

        ?>

        <div class="games mb-5">
            <h2>Games</h2>
            <div class="d-flex">

                <?php
                foreach ($games as $key => $value) {
                    echo '<div class="card probando mx-1">
                                <div class="card-header _header">
                                    <h3>' . $value->name . '</h3>
                                </div>
                                <div class="card-body _body">
                                    <img class="_img" src="' . $value->background_image . '">
                                </div>
                                <div class="card-footer _footer">
                                    <h2>' . $value->released . '</h2>
                                </div>';
                        if ( $gameuser -> getGamUserCountByData( $_SESSION['id'], $value -> id ) > 0 ) {
                            echo '<button id="' . $value->id . '" class="btn btn-primary __game_quit">Quitar</button>';
                        }else {
                            echo '<button id="' . $value->id . '" class="btn btn-primary __game">Agregar</button>';
                        }
                                
                    echo '</div>';
                }
                ?>

                <div class="probando mx-1">
                    <div class="card-body _body _align">
                        <a href="#" class="btn btn-primary">View all games</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="platforms mb-5">
            <h2>Platforms</h2>
            <div class="d-flex">

                <?php

                foreach ($platforms as $key => $value) {
                    echo '<div class="card probando mx-1">
                                <div class="card-header _header">
                                    <h3>' . $value->name . '</h3>
                                </div>
                                <div class="card-body _body">
                                    <img class="_img" src="' . $value->image_bg . '">
                                </div>
                              </div>';
                }

                ?>

                <div class="probando mx-1">
                    <div class="card-body _body _align">
                        <a href="#" class="btn btn-primary">View all platforms</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="genres mb-5">
            <h2>Genres</h2>
            <div class="d-flex">

                <?php

                foreach ($genres as $key => $value) {
                    echo '<div class="card probando mx-1">
                                <div class="card-header _header">
                                    <h3>' . $value->name_genre . '</h3>
                                </div>
                                <div class="card-body _body">
                                    <img class="_img" src="' . $value->image_bg . '">
                                </div>
                            </div>';
                }

                ?>

                <div class="probando mx-1">
                    <div class="card-body _body _align">
                        <a href="#" class="btn btn-primary">View all genres</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modes mb-5">
            <h2>Modes</h2>
            <div class="d-flex">

                <?php

                foreach ($modes as $key => $value) {
                    echo '<div class="card probando mx-1">
                                <div class="card-header _header">
                                    <h3>' . $value->name_mode . '</h3>
                                </div>
                                <div class="card-body _body">
                                    <img class="_img" src="' . $value->image_bg . '">
                                </div>
                            </div>';
                }

                ?>

                <div class="probando mx-1">
                    <div class="card-body _body _align">
                        <a href="#" class="btn btn-primary">View all modes</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const games = document.querySelectorAll('.__game');
        const games_quit = document.querySelectorAll('.__game_quit');

        games.forEach((btn, i) => {
            games[i].addEventListener('click', () => {
                const id_game = games[i].getAttribute('id');

                const formData = new FormData();

                formData.append('user', <?php echo $_SESSION['id'] ?>);
                formData.append('game', id_game);
                formData.append('action', '1');

                const request = new XMLHttpRequest();
                request.open('POST', '../../controllers/favorite.controller.php', true);
                request.onreadystatechange = function(e) {
                    if (request.readyState == 4) {
                        if (request.status == 200) {
                            if ((request.responseText === 'OK')) {
                                // alert(request.responseText);
                                alert('Game added successfully');
                            } else {
                                console.log('fallo');
                            }
                        }
                    }
                }
                request.send(formData);
            })
        });

        games_quit.forEach( (btn, i) => {
            games_quit[i].addEventListener('click', () => {
                const id_game = games_quit[i].getAttribute('id');

                const formData = new FormData();

                formData.append('user', <?php echo $_SESSION['id'] ?>);
                formData.append('game', id_game);
                formData.append('action', '2');

                const request = new XMLHttpRequest();
                request.open('POST', '../../controllers/favorite.controller.php', true);
                request.onreadystatechange = function(e) {
                    if (request.readyState == 4) {
                        if (request.status == 200) {
                            if ((request.responseText === 'OK')) {
                                // alert(request.responseText);
                                alert('Game disaggregate');
                            } else {
                                console.log('fallo');
                            }
                        }
                    }
                }
                request.send(formData);
            })
        })
    </script>


