
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Galeria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="static/style.css">
        <script type="text/javascript" src="static/js/jsWai.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".button1").click(function(){
                    $(".link").slideToggle();
                });
            });
        </script>
    </head>

    <body style = "font-family: Arial, Helvetica, sans-serif;" onload="countdown();">
        <a id="top"></a>
        <div id="topic">
            <h1>Tatry - najpiękniejsze miejsce na Ziemi</h1>
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px"
                        src="http://jigsaw.w3.org/css-validator/images/vcss"
                        alt="Poprawny CSS!" />
                </a>
            </p>
        </div>

        <div style="overflow:auto">
            <div id="navigation">
              <a href="index.html">Strona główna</a>
              <a href="galeria.html">Galeria</a>
              <a href="formularz.html">Formularz</a>
              <a href="Historia.html">Historia</a>
              <a href="galeriaZbiorcza.php">Galeria wspólna</a>
              <a href="register.php">Rejestracja</a>
              <a href="login.php">Logowanie</a>
              <a href="galeriaWybranych.php">Wybrane zdjęcia</a>
            </div>
        
            <div id="content">
                <div style="text-align: center;"><h2>Galeria</h2></div>
                    <?php require_once '../groupChosen.php' ?>
              
            
            <div class='gallery'>
                
                  
            </div>
        </div>
            <div id="aboutMe">
                <p class="link"> <a href="http://www.topr.pl/" target="_blank"> Oficjalna strona TOPR</a></p>
                <p class="link"><a href="https://mapa-turystyczna.pl/tatry#49.20131/19.94843/10" target="_blank">Moja ulubiona mapa Tatr</a></p>
                <p class="link"> <a href="https://www.instagram.com/tatry_official/" target="_blank"> Najpiękniejsze zdjęcia prosto z Tatr</a></p>
                <button class="button1">Pokaż/Schowaj linki</button>
            </div>
        </div>
        <a href="#top"> Powrót na górę strony</a>
        <div id ="footer">
            Jakub Janeczek - Politechnika Gdańska - Informatyka - Tatry
            <div id="clock"></div>
        </div>
    </body>
</html> 
