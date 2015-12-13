<?php
// ----------------------
// Account creator script
// ----------------------

// include essential files
include 'db_connect.php';

// generate a pseudo-random password, not safe enough for big productions but works fine here.
function studentPassword()
{
	$pwd = bin2hex(openssl_random_pseudo_bytes(3));
	// Return password so we can use it to insert it into the tables later.
	//$pwd = "";
	return $pwd;
}

// generate a color code that'll be used to determine what text the user will read.
function studentColorCode()
{
	$number = rand(1,3);
	
	if ($number == "1"){
		$ColorText2 = "pBlauw";
	}else{
		if ($number == "2"){
			$ColorText2 = "pGeel";
		}else{	
			if ($number == "3"){
				$ColorText2 = "pRood";
			}
		}
	}
}

// loop to generate all the accounts in a proper fashion.
for ($x = 1; $x <= 100; $x++) {

	$studentpassword = studentPassword();
	$studentname = "leerling".$x."a";
	$color = studentColorCode();
	 
	$query = "INSERT IGNORE INTO `PWS_UserData`
			(StudentLoginName, StudentPassword, ColorText2)
			VALUES ('$studentname', '$studentpassword', '$color')";
			
	if (mysqli_query($con, $query) === TRUE) {
		printf("Succesfully created the accounts..\n<br>");
	}
}



?>