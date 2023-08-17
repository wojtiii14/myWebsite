<?php

function valid_email($str) {
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function valid_phone($str) {
	return (!preg_match("/^\\+?[1-9][0-9]{8,15}$/", $str)) ? FALSE : TRUE;
}

session_start();

$FullName = $_POST['fullName'];
$email = $_POST['mail']; 
$phone =  $_POST['phoneNumber']; 

$phone = str_replace(' ', '', $phone);
$phone = str_replace('-', '', $phone);
$phone = str_replace('(', '', $phone);
$phone = str_replace(')', '', $phone);

$FullName = trim($FullName);
$email = trim($email);
$phone = trim($phone);

$_SESSION['fullName'] = $FullName;
$_SESSION['mail'] = $email;
$_SESSION['phone'] = $phone;

$vd = true;

require_once "connect.php";

$connection = @new mysqli($host, $db_user, $db_password, $db_name, $db_port);

// Sprawdzenie połączenia
if ($connection->connect_error) {
    die("Błąd połączenia: " . $connection->connect_error);
}

// Zapytanie SQL do sprawdzenia, czy e-mail istnieje w bazie danych
$query = "SELECT * FROM `clients` WHERE `E-mail` = '$email'";

$query2 = "SELECT * FROM `clients` WHERE `Phone Number` = '$phone'";

// $result = $connection->query($query);

$result = mysqli_query($connection, $query);

$result2 = mysqli_query($connection, $query2);

// Zamykanie połączenia
$connection->close();


if ($FullName == "")
 {
	$_SESSION['error'] = '<span style="color:red">Nie wypełniono pola imię i nazwisko</span>';

 	$vd = false;
 } 
 elseif (strlen($FullName) < 7 and strlen($FullName) > 0) 
 {
	$_SESSION['error'] = '<span style="color:red">Zły format imienia i nazwiska</span>';

    $vd = false;
 };

 if ($email == "") //email
 {
	$_SESSION['error1'] = '<span style="color:red">Nie wypełniono pola adres e-mail</span>';

    $vd = false;
 }
 elseif (!valid_email($email)) 
 {
	$_SESSION['error1'] = '<span style="color:red">Niepoprawny format adresu e-mail</span>';

    $vd = false;
 }elseif ($result->num_rows > 0) {
    $_SESSION['error1'] = '<span style="color:red">Podany e-mail mam już w bazie danych</span>';

	$vd = false;
};

 if ($phone == "") //telefon
 {	 
	$_SESSION['error2'] = '<span style="color:red">Nie wypełniono pola numer telefonu</span>';

    $vd = false;
 } elseif(!valid_phone($phone)) {
	$_SESSION['error2'] = '<span style="color:red">Nieprawidłowy format numeru telefonu</span>';

	$vd = false;

} elseif ($result2->num_rows > 0) {
    $_SESSION['error2'] = '<span style="color:red">Podany numer mam już w bazie danych</span>';

	$vd = false;
};

//  header('Location: index.php#contact');

 if($vd == true) {

	// insert client to database

	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name, $db_port);

	// Check connection
	if ($connection->connect_errno != 0) {
		$_SESSION['sql_error'] = "Error: " . $connection->connect_errno;
	}
	else {
		$sqlquery = "INSERT INTO `clients` (`Name and Surname` , `E-mail`, `Phone Number`)
	VALUES ('$FullName', '$email', '$phone')";

	mysqli_query($connection, $sqlquery);

	}
	
	unset($_SESSION['fullName']);
	unset($_SESSION['mail']);
	unset($_SESSION['phone']);

	header('Location: panel.php');

	$connection->close();

} else {
	$_SESSION['final'] = '<span style="color:red">Walidacja nie powiodła się!</span>';
	header('Location: add.php');
};

?>