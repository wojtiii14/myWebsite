<?php

    session_start();
    
    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
      header('Location: panel.php');
      exit();
    }
  ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

    <title>Wojciech Kaczmarek - Strona Internetowa</title>
    
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">

    <link rel="icon" type="image/x-icon" href=" ">
    <link id="theme" rel = "stylesheet" href = "style_light.css" type = "text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <script src="scripts.js"></script>
  
</head>
<body onLoad="loadSavedTheme()">
<div class="navbar">
        <img src="img/logo.png" alt="Logo">
        <img src="img/light_dark_toggle.png" onClick="swapStyleSheet(); saveThemePreference();">
    </div>

    <div id="container">
        <h1>Panel Administratora</h1>
    <form action="login.php" method="post">
        <input type = "text" name = "username" placeholder="Login" class = "box"/>
        </br>
        <input type = "password" name = "password" placeholder="Hasło" class = "box" />
        </br>
        <input type="submit" value="Login">
        
    </form>
  <?php
    if(isset($_SESSION['error']))
    {
      echo $_SESSION['error'];unset($_SESSION['error']);
    }
  ?>
  </div>
<div class="footer">
  Wojciech Kaczmarek &copy;
  <script>
        var CurrentYear = new Date().getFullYear()
	    document.write(CurrentYear)
    </script>. Wszystkie prawa zastrzeżone.</br>
</div>
</body>
</html>