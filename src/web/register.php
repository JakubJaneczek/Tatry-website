<?php
require_once '../mongo.php';
$blad = "";

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['repeat_pass']) && isset($_POST['email']))
{
    $login = $_POST['login'];
    $password = $_POST['pass'];
    $repeat_password = $_POST['repeat_pass'];
    $email = $_POST['email'];

    if ($password === $repeat_password)
    {
        //echo "OK";
        if  (!LoginExist($login))
        {
            echo "login nie występuje w bazie";
            AddNewUser($login, $password, $email);
        }
        else {$blad = "login zajęty ";}
      
    } 
       else 
    {
       //hasła niezgodne - dalej widoczny formularz
       $blad = "Hasła nie są takie same.";
    }

    $db = get_db();
}
?>
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
        </div>
        
        <div id="content">
            <form  method="POST">
                <label for="login">Login:</label><br>
                <input type="text" name="login" required /><br />
                <label for="email">Email:</label><br>
                <input type="text" name="email" required /><br />
                <label for="pass">Hasło:</label><br>
                <input type="password" name="pass" required /><br />
                <label for="repeat_pass">Powtórz hasło:</label><br>
                <input type="password" name="repeat_pass" required /><br />
                <input type="submit" value="Zarejestruj">
            </form>
            <?= "<p style='color:red'>". $blad . "</p >" ?>

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

