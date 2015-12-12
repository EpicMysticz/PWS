<?php
include 'utils/common.php';
checkUser();
?>

<html oncontextmenu="return false">
<body>
<!-- include scripts and css -->
<script src="../build/pdf.js"></script>
<script src="resources/js/debugger.js"></script>
<script src="resources/js/viewer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="resources/css/overlay.css" media="all">

<script>
/* User has finished reading the text! Save the local time and calculate time taken
to read the text and pass this to our API. */
$(document).keypress(function(event) {
	if (TextStart){
		var TimeText1End = Math.floor(Date.now() / 1000);
		console.log('END');
		//alert(''); iets zeggen over dat er nog 1 tekst hoeft?
		$.post('utils/api.php', {TimeText1: TimeText1End-TimeText1Start});
	}
	window.location.replace("q1.php");
	return false;
});
</script>

<!-- Script to render the PDF onto the page. -->
<script type="text/javascript">
function renderPDF(url, canvasContainer, options) {
    var options = options || { scale: 1.5 };
        
    function renderPage(page) {
        var viewport = page.getViewport(options.scale);
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };
        
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        canvasContainer.appendChild(canvas);
        
        page.render(renderContext);
    }
    
    function renderPages(pdfDoc) {
        for(var num = 1; num <= pdfDoc.numPages; num++)
            pdfDoc.getPage(num).then(renderPage);
    }
    PDFJS.disableWorker = true;
    PDFJS.getDocument(url).then(renderPages);
}   
</script>

<script>
/*Toggle the overlay to start reading the text we've prepared for the students.*/
function toggleOverlay(){
	var overlay = document.getElementById('overlay');
	var specialBox = document.getElementById('specialBox');
	overlay.style.opacity = 10;
	
	/*User has started reading the text -> set to true*/
	TextStart = true;
	
	/*Save time of when the overlay disappears.*/
	TimeText1Start = Math.floor(Date.now() / 1000);
	
	/*Debug purposes*/
	console.log('START');
	
	if(overlay.style.display == "block"){
		overlay.style.display = "none";
		specialBox.style.display = "none";
	}
}
</script>

<div id="overlay" style="opacity: 10; display: block;"></div>
<!-- End Overlay -->

<!-- Start Special Centered Box -->
<div id="specialBox" style="display: block;">
	<p>
		<br>
		<b>Instructies voor het lezen van de tekst:</b>
		<br>
		<br>
		Deze tekst dient <b>begrijpend</b> gelezen te worden (er worden vragen na de tekst gesteld!)<br>
		Druk tijdens het lezen van de tekst op <b>GEEN</b> toetsen!! Gebruik het <b>scroll-wiel</b> om naar beneden te scrollen.<br>
		<br>
		Als je klaar bent met het lezen van de tekst, druk dan op <b>SPATIEBAR</b>, dan wordt je doorgestuurd naar de vragenlijst.<br>
		<br>
		Als je enige vragen hebt, steek dan je vinger op en dan komen we naar je toe.<br>
		<br>
		Succes!
	</p>
    <button onmousedown="toggleOverlay()" id="abc1223" >Begin met de tekst</button>
</div>

<div id="holder">
	<script type="text/javascript">
	renderPDF('resources/pdf/text1/t1.pdf', document.getElementById('holder'));
	</script>  
</div>
</body>
<style>
div {
    text-align: center; /* IE */
}
</style>
</html>