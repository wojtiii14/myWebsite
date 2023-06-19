<?php

    session_start()

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

    <title>Wojciech Kaczmarek - websitePreview</title>
    
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">

    <link rel="icon" type="image/x-icon" href=" ">
    <link rel = "stylesheet" href = "style.css" type = "text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="navbar">
        <img src="img/logo.png" alt="Logo">
    </div>

    <div id="container">
     <img src="img/me_4.jpg">
    
     <h1>Hi, I am Wojciech!</h1>
     <p>
     I am Computer Science student and I am really passionate about building websites!
     Techologies I use are: HTML, CSS, PHP and JavaScript.
     I really admire minimalistic design and its approach in tech world.
     Feel free to contact me via form below.
    </p>

    <img src="img/technologies.png">

    <form id="contact" method="post" action="handler.php">

                <h2>Contact Form</h2>

                <input type="text" placeholder="First and Second Name" name="fullName" value="<?php if(isset($_SESSION['fullName'])) {echo $_SESSION['fullName']; unset($_SESSION['fullName']);} ?>"></br><?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                <br/>

                <input type="text" placeholder="E-mail address" name="mail" value="<?php if(isset($_SESSION['mail'])) {echo $_SESSION['mail']; unset($_SESSION['mail']);} ?>"></br><?php echo $_SESSION['error1']; unset($_SESSION['error1']);?>
                <br/>
                
                <input type="text" placeholder="Phone number" name = "phoneNumber" value="<?php if(isset($_SESSION['phone'])) {echo $_SESSION['phone']; unset($_SESSION['phone']);} ?>"></br><?php echo $_SESSION['error2']; unset($_SESSION['error2']);?>
                <br/>

                <label>
                    <input type="checkbox" name="PersonalDataAgree" value="on">
                    I consent to processing of my personal data<br/>for the contact purposes.</br>
                </label>
                <?php echo $_SESSION['error3']; unset($_SESSION['error3']);?></br>
                <input type="submit" value="Send"></br>
                <?php echo $_SESSION['final']; unset($_SESSION['final']);?><br/>
        </form>
  </div>

  <div class="footer">
  Wojciech Kaczmarek &copy;
  <script>
        var CurrentYear = new Date().getFullYear()
	    document.write(CurrentYear)
    </script>. All Rights Reserved.</br>
</div>
</body>
</html>