<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
      header('Location: admin.php');
      exit();
    }

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: panel.php');
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

    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <link id="theme" rel = "stylesheet" href = "style_light.css" type = "text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <script src="scripts.js"></script>
  
</head>
<body onLoad="loadSavedTheme()">
<div class="navbar">
        <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
        <img src="img/light_dark_toggle.png" onClick="swapStyleSheet(); saveThemePreference();">
    </div>

    <div id="container">
        <p>Czy na pewno chcesz usunąć klienta?</p>
        <a href="delete.php?id=<?php echo $id; unset($_GET['id']);?>"><input type="button" value="Tak"></a>
        <a href="panel.php"><input type="button" value="Nie"></a>

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