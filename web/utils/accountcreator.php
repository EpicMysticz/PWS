<table border="1" width="40%">
<tr>
	<th>Login</th>
	<th>Wachtwoord</th>
	<th>T1</th>
	<th>T2</th>
</tr>
<?php
// Account creator script

// Include DB connection info so we can save the created accounts
include 'db_connect.php';

//Generate a pseudo-random password, not safe enough for big productions but works fine here.
function studentPassword()
{
	//$pwd = bin2hex(openssl_random_pseudo_bytes(3));
	// Return password so we can use it to insert it into the tables later.
	$pwd = "";
	return $pwd;
}

//!!Deprecated!!
//Generate a color code that'll be used to determine what text the user will read.
function studentColorCode()
{
	/*$number = rand(1,3);
	
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
	}*/
	$ColorText2 = "pBlauw";
	return $ColorText2;
}

/* Loop to generate all the accounts in a proper fashion.
for ($x = 1; $x <= 4; $x++) {

	$studentpassword = studentPassword();
	$studentname = "abc".$x;
	$color = studentColorCode();
	 
	$query = "INSERT IGNORE INTO `PWS_UserData`
			(StudentLoginName, StudentPassword, ColorText2)
			VALUES ('$studentname', '$studentpassword', '$color')";
			
	if (mysqli_query($con, $query) === TRUE) {
		printf("Succesfully created the accounts..\n<br>");
	}
}*/

printAccounts();

function printAccounts()
{
	global $con;
	
	$query = "SELECT * FROM `PWS_UserData`
			ORDER BY ID ASC;";

			$result = mysqli_query($con, $query);

	if (!mysqli_query($con,$query)) {
			die('Error: ' . mysqli_error($con));
	}

	while ($get_info = mysqli_fetch_row($result)){
		echo '<tr height="50">';
		foreach ($get_info as $field)
		echo "\t<td>$field</td>\n";
		echo "</tr>\n";
		echo "<br>\n";
	}
		echo "</table>\n";
		
	mysqli_close($con);
	
}



?>