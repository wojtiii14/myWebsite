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

    <link rel="icon" type="image/x-icon" href=" ">
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

<?php
    echo "<p>Cześć ".$_SESSION['user']."!</p>";
    echo "<a href='logout.php'><input type='button' value='Logout'></button></a>";
    $counterFile = 'counter.txt';

    // Odczytaj aktualną wartość licznika
    $counter = (int) file_get_contents($counterFile);
    echo "<p>Liczba odwiedzin strony: $counter</p>";
  ?>
<div class="table_desc">Klienci</div>
<table>
    <tr>
        <th>ID</th>
        <th>Imię i Nazwisko</th>
        <th>E-mail</th>
        <th>Telefon</th>
        <th>Usuwanie</th>
    </tr>

<?php

    require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name, $db_port);

	// Check connection
	if ($connection->connect_errno != 0) {
		$_SESSION['sql_error'] = "Error: " . $connection->connect_errno;
	}
	else {
		$sqlquery = "select * from `clients`";

	    $result = mysqli_query($connection, $sqlquery);

        if ($result->num_rows > 0) {
            // Wyświetlanie danych każdego rekordu
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Name and Surname"] . "</td>";
                echo "<td>" . $row["E-mail"] . "</td>";
                echo "<td>" . $row["Phone Number"] . "</td>";
                echo "<td><a href='delete.php?id=" . $row["ID"] . "'>Usuń</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found.</td></tr>";
        }
    }

    $connection->close();
?>

</table>

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