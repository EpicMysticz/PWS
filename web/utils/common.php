<?php 
session_start();
ob_start();

include 'db_connect.php';

function loginUser($username,$password){
	$errorText = '';
	$validUser = false;
	global $con;
	
	$query = "SELECT Active, StudentLoginName,StudentPassword, ColorText2 FROM `PWS_UserData` WHERE StudentLoginName='$username'";
	$result = mysqli_query($con, $query);
	
	if ($result = mysqli_query($con, $query)) {
		while ($row = mysqli_fetch_assoc($result)) {
			$StudentLoginName = $row['StudentLoginName'];
			$StudentPassword = $row['StudentPassword'];
			$ColorText2 = $row['ColorText2'];
			$Active = $row['Active'];
		}
	}else{
		// Throw error - mysqli db not found or connection error in general.
		$errorText ='Error: Ik kon me niet verbinden met de database.';
	}
	
	// Do the passwords match each other?
	if($password !== $StudentPassword){
		//Nope -> Throw error.
		$errorText = 'Loginnaam en/of wachtwoord komen niet overeen!';
	}else{
		// Is the account set to active?
		if ($Active != "Yes"){
			// Nope -> Throw error.
			$errorText = 'Deze account kan niet meer gebruikt worden!';
		}else{
		// All good -> Login.
			if ($errorText == ''){
			
				$validUser= true;
				$_SESSION['StudentLoginName'] = $StudentLoginName;
				$_SESSION['ColorText2'] = $ColorText2;
				$_SESSION['StudentClass'] = '';
			}
		}
	}
    
    if ($validUser == true){
		$_SESSION['validUser'] = true;
    }else{ 
		$_SESSION['validUser'] = false;
	}
	
 	return $errorText;	

}


// Function to check if the user is actually logged in or not.
function checkUser(){
	if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
		header('Location: login.php');
	}
}
?>