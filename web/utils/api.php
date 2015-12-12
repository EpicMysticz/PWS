<?php
// invoke session so we can use info we store data in it
session_start();
ob_start();

// include essential files
include 'db_connect.php';
include 'common.php';

// check if the student is actually logged in.
//if ($_SESSION['validUser'] == "1"){

// First form page -- Only gets shown ONCE.
// Collects Class/Gender/Age -> Inserts it into the database.
if (isset($_POST['StudentClass']))
{	
	$StudentClass = $_POST['StudentClass'];
	$StudentGender = $_POST['StudentGender'];
	$StudentAge =  $_POST['StudentAge'];
	$StudentLoginName = $_SESSION['StudentLoginName'];
	
	$_SESSION['StudentClass'] = $_POST['StudentClass'];
		
	$query = "UPDATE `PWS_UserData` SET
				StudentClass='$StudentClass',
				StudentGender='$StudentGender',
				StudentAge='$StudentAge'
			WHERE StudentLoginName = '$StudentLoginName'";
				
	if (mysqli_query($con, $query) === TRUE) {
		//query is sucesful
	}
	header('Location: ../landing.php');
}


// Mini "function" to update database records for TimeText1
if (isset($_POST['TimeText1'])) {

	// Grab the time needed to read the text.
    $TimeText1 = $_POST['TimeText1'];
	
	// Which student has finished the text?
    $StudentLoginName = $_SESSION['StudentLoginName'];

	// Update database records.
	$query = "UPDATE `PWS_UserData` 
			SET TimeText1='$TimeText1'
			WHERE StudentLoginName = '$StudentLoginName'";		
	if (mysqli_query($con, $query) === TRUE) {
		//printf("Succes!");
	}
	
}

// Mini "function" to update database records for TimeText2
if (isset($_POST['TimeText2'])) {

	// Grab the time needed to read the text.
    $TimeText2 = $_POST['TimeText2'];
	
	// Which student has finished the text?
    $StudentLoginName = $_SESSION['StudentLoginName'];
		
	// Update database records.
	$query = "UPDATE `PWS_UserData`
			SET TimeText2='$TimeText2'
			WHERE StudentLoginName = '$StudentLoginName'";		
	if (mysqli_query($con, $query) === TRUE) {
		//printf("Succes!");
	}
}

if(isset($_POST['Mode']) && ($_POST['Mode'] == 'Colorblind'))
{
	ColorblindTest(
		$_POST['C1'],
		$_POST['C2'],
		$_POST['C3'],
		$_POST['C4'],
		$_POST['C5'],
		$_SESSION['StudentLoginName']
	);
}
if(isset($_POST['Mode']) && ($_POST['Mode'] == 'VragenlijstT1'))
{
	VragenlijstT1(
		$_POST['Q1'],
		$_POST['Q2'],
		$_POST['Q3'],
		$_POST['Q4'],
		$_SESSION['StudentLoginName']
	);
}
if(isset($_POST['Mode']) && ($_POST['Mode'] == 'VragenlijstT2'))
{
	VragenlijstT2(
		$_POST['Q5'],
		$_POST['Q6'],
		$_POST['Q7'],
		$_POST['Q8'],
		$_POST['Q9'],
		$_POST['Q10'],
		$_SESSION['StudentLoginName']
	);
}

// Grab and insert results from the first survey into the DB.
function VragenlijstT1($Q1, $Q2, $Q3, $Q4, $StudentID)
{
	global $con;
	
	$query = "UPDATE `PWS_UserData` SET
				Q1='$Q1',
				Q2='$Q2',
				Q3='$Q3',
				Q4='$Q4'
			WHERE StudentLoginName ='$StudentID'";		
	if (mysqli_query($con, $query) === TRUE) {
		header('Location: ../tekst2.php');
	}
}

// Grab and insert results from the second survey into the DB.
function VragenlijstT2($Q5, $Q6, $Q7, $Q8, $Q9, $Q10, $StudentID)
{
	global $con;
	
	$query = "UPDATE `PWS_UserData` SET
				Q5='$Q5',
				Q6='$Q6',
				Q7='$Q7',
				Q8='$Q8',
				Q9='$Q9',
				Q10='$Q10'
			WHERE StudentLoginName ='$StudentID'";		
	if (mysqli_query($con, $query) === TRUE) {
		header('Location: ../logout.php');
	}
}

// Grab and insert results from the RG-colorblindness test.
// Code could (and should) get optimized.
function ColorblindTest($C1, $C2, $C3, $C4, $C5, $StudentID)
{
	global $con;
	$MistakeCount=0;
	
	if ($C1 != "12" || $C2 != "6" || $C3 != "" || $C4 != "42" || $C5 != "74"){
		// C1 has the same answer for colorblind and normal people.
		// shouldn't be misguessed
		if (empty($C1)){
			$MistakeCount++;
			$C1incorrect = "C1(E)";
		}
		if (empty($C2)){
			$MistakeCount++;
			$C2incorrect = "C2(E)";
		}
		if (empty($C4)){
			$MistakeCount++;
			$C4incorrect1 = "C4(E)";
		}
		if (empty($C5)){
			$MistakeCount++;
			$C5incorrect = "C5(E)";
		}
		if ($C3 == "2"){
			$MistakeCount++;
			$C3incorrect = "C3(2)";
		}
		if ($C4 == "2"){
			$MistakeCount++;
			$C4incorrect1 = "C4(2)";
		}
		if ($C4 == "4"){
			$MistakeCount++;
			$C4incorrect2 = "C4(4)";
			$ColorblindGreen = "true";
		}
		if ($C5 == "21"){
			$MistakeCount++;
			$C5incorrect = "C5(21)";
		}
		
	}
	
	$ColorblindRed = $C1incorrect.$C2incorrect.$C3incorrect.$C4incorrect1.$C4incorrect2.$C5incorrect;
	
	// check if value isn't null (if student isn't green-color blind)
	if (is_null($C4incorrect2)){
		$ColorblindGreen = "false";
	}

	// Update database records.
	$query = "UPDATE `PWS_UserData` SET
				ColorblindRed='$ColorblindRed',
				ColorblindGreen='$ColorblindGreen',
				ColorMistakes='$MistakeCount'
			WHERE StudentLoginName ='$StudentID'";		
	if (mysqli_query($con, $query) === TRUE) {
		header('Location: ../tekst1.php');
	}

}

function CompleteSurvey()
{
	// make $con; a global so we can use it to connect from within the function
	global $con;
	
	// grab the student's id
	$StudentLoginName = $_SESSION['StudentLoginName'];
	
	// declare the account as in-active
	$query = "UPDATE `PWS_UserData`
			SET Active='No'
			WHERE StudentLoginName = '$StudentLoginName'";
			
	if (mysqli_query($con, $query) === TRUE) {
	
		// succesfully set the account to be in-active.
		// let's destroy the session and cookies.
		
		$_SESSION = array();
		
		if (isset($_COOKIE[session_name()])) { 
			$params = session_get_cookie_params();
			setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
		}
		session_destroy();
		
		// send user back to login.php
		header('Location: login.php');
	}
}

/*
TODO:

Welkom tekst: @login.php(if succesful)
	Uitleggen waarvoor het pws dient: leesvaardigheidstoets.
		Aandachtig de tekst lezen.
Move pdfs to resources folder = x
Code cleanup
Code identation = x
Examentekst goed aanpassen voor de website (+2de examen).
Enquete module
Kleurenblindheid module
Dankje aan het eind voor het meedoen aan het PWS. = x
Tijdslimiet instellen? (Tijdelijke cookies?)
	Onderbreking bij de tweede tekst? -> hoe uitloggen?
Inputbare data veilig maken:
	Escape user input?

	
	
Hoe moet het werken?:

Login.php
	login succes ->	welcome message -> fill forms out -> send to colorblind module
Colorblindcheck.php
	3 color cards with OPEN input boxes -> compare numbers with hardcoded values.
		don't tell user if he/she's colorblind, ignore the results by this student
Tekst1.php -> small black box, state where beginning of text is, make it clear that
			to end the text (if finished), press enter.
Tekst2.php -> small black box, state where beginning of text is, make it clear that
			to end the text (if finished), press enter.
Logout.php -> send back to login page, survey is finished.
		
	

logboek:
24 sept, 2015
yannick: 4 1/2 uren aan website gewerkt: login module, tijd module, opslag module gemaakt.
begin gemaakt met de veiligheid van data op de website.
7 okt, 2015
yannick: 2 uren bezig geweest met website: account activate module gemaakt, kleurencoden module alvast gemaakt
ook tekst indeling aangepast om beter leesbaar te maken. 	
	
	
9oct,	
1100 start
1115 eind: code cleanup + tekst klaar voor productie.	

1040 start
1110 eind: code cleanup deel 2, dankje aan het eind, mensen gevraagd om de tekst te lezen om avg lees tijd te ontdekken.


	*/







?>