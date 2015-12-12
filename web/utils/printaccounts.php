<html>
<body>

<table border="1" width="40%">
<tr>
	<th>Login</th>
	<th>Wachtwoord</th>
	<th>T1</th>
	<th>T2</th>
</tr>

<?

// print all accounts
printAccounts();

// function to print all accounts.
function printAccounts()
{
	global $con;
	
	$query = "SELECT StudentLoginName, StudentPassword, TimeText1, Timetext2 FROM `PWS_UserData`
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

</body>
</html>