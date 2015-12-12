<?php
include 'utils/common.php';
checkUser();
?>
<html oncontextmenu="return false">
	<head>
		<title>Vragenlijst:</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
<center>
<body class="Vragenlijst">
	<h1>Vragenlijst:</h1>
	<br>
	<form name="form1" method="post" action="utils/api.php">
		<b>Vraag 1:</b> Hoe kom het dat jongeren waarschijnlijk meer schuld zullen opbouwen in de toekomst?
		<select class="element select medium" id="Q1" name="Q1">
			<option selected disabled hidden value=''></option>
			<option value="A"> Jongeren worden steeds dommer.</option>
			<option value="B"> Jongeren krijgen geen studiefinanciering meer.</option>
			<option value="C"> Jongeren geven te veel geld uit.</option>
			<option value="D"> Jongeren hebben geen geld.</option>
		</select>
		<br>
		<b>Vraag 2:</b> Door wie werd dit jaar de noodklok uitgeroepen?
		<select class="element select medium" id="Q2" name="Q2">
			<option selected disabled hidden value=''></option>
			<option value="A"> Nederlands Instituut voor Budgetvoorlichting</option>
			<option value="B"> Centraal Bureau voor de Statistiek</option>
			<option value="C"> SNS</option>
			<option value="D"> Pensioenfonds Zorg en Welzijn</option>
		</select>
		<br>
		<b>Vraag 3:</b> Wat vond je van de tekst?
		<select class="element select medium" id="Q3" name="Q3">
			<option selected disabled hidden value=''></option>
			<option value="A">Saai.</option>
			<option value="B">Neutraal.</option>
			<option value="C">Leuk.</option>
			<option value="D">Erg Leuk.</option>
		</select>
		<br>
        <b>Vraag 4:</b> Hoe was de tekst te lezen?
		<select class="element select medium" id="Q4" name="Q4">
			<option selected disabled hidden value=''></option>
			<option value="A">Ik vond de tekst moeilijk.</option>
			<option value="B">Ik vond de tekst een beetje moeilijk.</option>
			<option value="C">Ik vond de tekst wel te lezen.</option>
			<option value="D">Ik vond de tekst makkelijk om te lezen.</option>
		</select>
		<br>
		<br>
		<input type="hidden" name="Mode" id="Mode" value="VragenlijstT1">
		<input type="submit" name="Submit" value="Verdergaan">
	</form>
</body>
</center>
</html>