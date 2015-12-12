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
	<form name="form1" method="post" action="utils/api.php" onSubmit="alert('Bedankt voor het meedoen aan het onderzoek! U wordt automatisch doorgestuurd naar de login pagina.')";>
		<b>Vraag 1:</b> Welke beroepsmopperaar word genoemd in de tekst?
		<select class="element select medium" id="Q5" name="Q5">
			<option selected disabled hidden value=''></option>
			<option value="A"> Theodore Dalrymple.</option>
			<option value="B"> Maarten van Rossem.</option>
			<option value="C"> Dolf Jansen.</option>
			<option value="D"> Gordon.</option>
		</select>
		<br>
		<b>Vraag 2:</b> Na welk geboortejaar lijken jongeren op sociale bommen te zijn?
		<select class="element select medium" id="Q6" name="Q6">
			<option selected disabled hidden value=''></option>
			<option value="A"> 1984.</option>
			<option value="B"> 1986.</option>
			<option value="C"> 1990.</option>
			<option value="C"> 1999.</option>
		</select>
		<br>
		<b>Vraag 3:</b> Wat vond je van de tekst?
		<select class="element select medium" id="Q7" name="Q7">
			<option selected disabled hidden value=''></option>
			<option value="A">Saai.</option>
			<option value="B">Neutraal.</option>
			<option value="C">Leuk.</option>
			<option value="D">Erg Leuk.</option>
		</select>
		<br>		
        <b>	Vraag 4:</b> Was deze tekst moeilijker de lezen dan tekst 1?
		<select class="element select medium" id="Q8" name="Q8">
			<option selected disabled hidden value=''></option>
			<option value="A">Ja.</option>
			<option value="B">Nee.</option>
		</select>
		<br>
        <b>Vraag 5:</b> Hoe was de tekst te lezen?
		<select class="element select medium" id="Q9" name="Q9">
			<option selected disabled hidden value=''></option>
			<option value="A">Ik vond de tekst moeilijk.</option>
			<option value="B">Ik vond de tekst een beetje moeilijk.</option>
			<option value="C">Ik vond de tekst wel te lezen.</option>
			<option value="D">Ik vond de tekst makkelijk om te lezen.</option>
		</select>
		<br>
		<br>
        <b>INDIEN BIJ VRAAG 5: Moeilijk of Beetje moeilijk (Anders leeg laten!)
		<br>
		Waardoor was de tekst moeilijker te lezen?</b>
		<select class="element select medium" id="Q10" name="Q10">
			<option selected disabled hidden value=''></option>
			<option value="A">Ik vond het een moeilijke tekst.</option>
			<option value="B">Ik vond de achtergrondkleur afleidend.</option>
			<option value="C">Ik vond de tekst moeilijk en vond de achtergrondskleur afleidend.</option>
		</select>
		<br>
		<br>
		<input type="hidden" name="Mode" id="Mode" value="VragenlijstT2">
		<input type="submit" name="Submit" value="Verdergaan">
	</form>
</body>
</center>
</html>