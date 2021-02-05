<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LearningSoulsGame</title>
<!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!--css-->
    <link rel="stylesheet" href="<?php __DIR__ ?>css/lsg/main.css" >
</head>
    <body>
            <?php

            require __DIR__ . '/Autoloader.php';
            Autoloader::register();

           // require_once "lsg/LearningSoulsGame.php";

            $lsg = new \lsg\LearningSoulsGame();
            $lsg->play_v1() ;
            ?>
         <div class="lsg-game override-pre"><?php $lsg->play_v1(); ?></div>

        <button class="btn btn-primary" id="lsg-replay">Play Again</button>

            <script>
                document.addEventListener('DOMContentLoaded',function (){
                    let play= document.getElementById('lsg-replay')
                    play.addEventListener('click',function (event){
                        window.location.reload()
                    })
                })
            </script>

    </body>
</html>







