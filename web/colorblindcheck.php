<?php
include 'utils/common.php';
checkUser();
?>
<html oncontextmenu="return false">
	<head>
		<title>Kleurenblindheidstest:</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="../tveen.css" type="text/css">
	</head>
<center>
<body class="Kleurenblindheidstest">
	<h1>Kleurenblindheidstest</h1>
	<form name="form1" method="post" autocomplete="off" action="utils/api.php">
		<table BORDERCOLOR="#333666" width="496">
			<td width="240"><img src="resources/img/1.png" width="242" height="240"><br>
				Welk getal ziet u? 
				<input type="text" id="C1" name="C1">
			</td>
			<td width="240"><img src="resources/img/2.png" width="242" height="240"><br>
				Welk getal ziet u?
				<input type="text" id="C2" name="C2">
			</td>
			<tr>
				<td><img src="resources/img/3.png" width="242" height="240"><br>
				Welk getal ziet u? 
						<input type="text" id="C3" name="C3">
						</input>
				</td>
				<td><img src="resources/img/4.png" width="242" height="240"> 
				Welk getal ziet u?
						<input type="text" id="C4" name="C4">
				</td>
			<tr>
				<td><img src="resources/img/5.png" width="242" height="240"> 
				Welk getal ziet u?
						<input type="text" id="C5" name="C5">
			</td>
			<tr>
		</table>
		<br>
		<input type="hidden" name="Mode" id="Mode" value="Colorblind">
		<input type="submit" name="Submit" value="Verdergaan">
	</form>
</body>
</center>
</html>
