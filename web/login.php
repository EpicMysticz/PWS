<?php
require_once('utils/common.php');

$error = '0';

if (isset($_POST['submitBtn'])){
	// Get user input.
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
        
	// Try to log the user in.
	$error = loginUser($username,$password);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html oncontextmenu="return false">
<head>
   <title>Portal</title>
   <link href="resources/css/login.css" rel="stylesheet" type="text/css" />
   <style>
   background: #E9ECEF;
   </style>	
</head>
<center>
<body id="main">
<h1>Login Portaal</h1>
<?php if ($error != '') {?>
      <form action="login.php" autocomplete="off" method="post" name="loginform">
        <table width="100%" allign="center">
          <tr><td>Username:</td><td> <input class="text" name="username" type="text"  /></td></tr>
          <tr><td>Password:</td><td> <input class="text" name="password" type="password" /></td></tr>
          <tr><td colspan="2"> <input class="text" type="submit" name="submitBtn" value="Login" /><?php if (isset($_POST['submitBtn'])){ 
	if ($error != ''){
		echo ' ' .$error. ' '; 
	}else{
		//do nothing
	}
}?></td></tr>
        </table>  
      </form>
</body>   
<?php
}
if (isset($_POST['submitBtn'])){
	if ($error == '') {
	
		$StudentLoginName = $_SESSION['StudentLoginName'];
		
		echo('<form action="utils/api.php" method="post">
			<label class="description" for="StudentClass">Groep (wordt verteld door Yannick): </label>
			<select class="element select medium" id="StudentClass" name="StudentClass"> 
				<option value="G1">Groep 1</option>
				<option value="G2">Groep 2</option>
				<option value="G3">Groep 3</option>
				<option value="G4">Groep 4</option>
			</select><br>
			<label class="description" for="StudentGender">Geslacht: </label>
			<select class="element select medium" id="StudentGender" name="StudentGender">
				<option value="Man">Man</option>
				<option value="Vrouw">Vrouw</option>
			</select><br>
			<label class="description" for="StudentAge">Leeftijd: </label>
			<select class="element select medium" id="StudentAge" name="StudentAge">
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="18">19</option>
			</select>
				<br><br><input type="submit" value="Verdergaan">
			</form>');
		//debug infos
		//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
	}
}
?>