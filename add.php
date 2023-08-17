<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
      header('Location: admin.php');
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

    <form id="contact" method="post" action="adding_handler.php">

                <h2>Dodaj nowego klienta</h2>

                <input type="text" placeholder="Imię i Nazwisko" name="fullName" value="<?php if(isset($_SESSION['fullName'])) {echo $_SESSION['fullName']; unset($_SESSION['fullName']);} ?>"></br><?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                <br/>

                <input type="text" placeholder="Adres E-mail" name="mail" value="<?php if(isset($_SESSION['mail'])) {echo $_SESSION['mail']; unset($_SESSION['mail']);} ?>"></br><?php echo $_SESSION['error1']; unset($_SESSION['error1']);?>
                <br/>
                
                <input type="text" placeholder="Numer Telefonu" name = "phoneNumber" value="<?php if(isset($_SESSION['phone'])) {echo $_SESSION['phone']; unset($_SESSION['phone']);} ?>"></br><?php echo $_SESSION['error2']; unset($_SESSION['error2']);?>
                <br/>
                <input type="submit" value="Dodaj"></br>
                <?php echo $_SESSION['final']; unset($_SESSION['final']);?><br/>
        </form>

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