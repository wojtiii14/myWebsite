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
$PersonalDataAgree = $_POST['PersonalDataAgree'];

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

if ($FullName == "")
 {
	$_SESSION['error'] = '<span style="color:red">Have not filled Name and surname</span>';

 	$vd = false;
 } 
 elseif (strlen($FullName) < 7 and strlen($FullName) > 0) 
 {
	$_SESSION['error'] = '<span style="color:red">Wrong format of Name and Surname</span>';

    $vd = false;
 };

 if ($email == "") //email
 {
	$_SESSION['error1'] = '<span style="color:red">Have not filled e-mail address</span>';

    $vd = false;
 }
 elseif (!valid_email($email)) 
 {
	$_SESSION['error1'] = '<span style="color:red">Wrong e-mail address format</span>';

    $vd = false;
 };

 if ($phone == "") //telefon
 {	 
	$_SESSION['error2'] = '<span style="color:red">Have not filled phone number</span>';

    $vd = false;
 } elseif(!valid_phone($phone)) {
	$_SESSION['error2'] = '<span style="color:red">Wrong phone number format</span>';

	$vd = false;

};

 if ($PersonalDataAgree != 'on') // Przetwarzanie danych osobowych
 {
	$_SESSION['error3'] = '<span style="color:red">Tick that field</span>';

    $vd = false;

 };

//  header('Location: index.php#contact');

 if($vd == true) {
	//przygotuj i wyślij maila	   
	$temat = 'New client registered!';	
	
	$wiadomosc = 'Name and Surname: '.$FullName."<br/>";
    $wiadomosc .= ' E-mail: '.$email."<br/>";
	$wiadomosc .= ' Telefon: '.$phone."<br/>";

	$temat2 = "Wojciech Kaczmarek - Thank You for contacting me!";

	$wiadomosc2 = "Thank You for contacting me. I will reach to you as soon as possible!<br/>";
	$wiadomosc2 .= "Wojciech Kaczmarek<br/>";
	$wiadomosc2 .= "wojtak123@gmail.com<br/>";
	$wiadomosc2 .= "tel. +48 668 792 084<br/>";
			
	$od  = "From: wojciech@reinwestuj.pl \r\n";
	$od .= 'MIME-Version: 1.0'."\r\n";
	$od .= 'Content-type: text/html; charset=UTF-8'."\r\n";
	
	// $adres = 'biuro@reinwestuj.pl';		  //mail ogólny, rozsyłany przez hosting
	$adres = 'wojtak123@gmail.com';		  //moj mail testowo
	$adres2 = $email;
	mail($adres, $temat, $wiadomosc, $od);
	mail($adres2, $temat2, $wiadomosc2, $od);
	$_SESSION['final'] = '<span style="color:green">I will reach to you as soon as possible!</span>';
	unset($_SESSION['fullName']);
	unset($_SESSION['mail']);
	unset($_SESSION['phone']);

	header('Location: index.php#contact');  

} else {
	$_SESSION['final'] = '<span style="color:red">Validation failed!</span>';
	header('Location: index.php#contact');
};
	



?>