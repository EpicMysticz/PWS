<?
	include '../../utils/common.php';
	checkUser();
	header("Content-type: text/css; charset: UTF-8");

	$Color =  $_SESSION['ColorText2'];

	if ($Color == "pGeel"){ // colorX
		$Colortext = "#FFFF9B";
	}
	if ($Color == "pBlauw"){ // colorY
		$Colortext = "#9BFFFF;";
	}
	if ($Color == "pRood"){ // colorZ
		$Colortext = "#FF9BFF";
	}
	
?>

body {
	background-color: <? echo $Colortext; ?>;
}