<?php

	session_start();
	include 		"Login/fbConnection/common.php";
	include_once 	"Login/fbConnection/fbconnect.php";

	require_once 	"config/config.php";

	// Via deze query roepen we de groepsnaam op uit de database
	$query = "SELECT CONCAT(groepnaam) 
	AS name FROM groepen";
	$result = @mysql_query ($query);
	
	$url = "http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";
	
	$events = json_decode(file_get_contents($url)); 
	//haal alle info van de url, goedkope hosting weigeren dat soms, bang voor hacking
	//zit json in die url, we moeten daar een array van maken, dmv json_decode
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Alle Evenementen</title>

	<script type="text/javascript" src="js/app.js"></script>
    
	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/scoirm.css" media="all">
    
</head>

<body>

	<?php include_once("include_header.php") ?>
    
  	<?php include_once ("include_gebruikerInfo.php") ?>

    <nav class="nav-tabs">
        <ul>
            <li><a href="GroepSelectie.php">Selecteer Familie</a></li>
            <li><a href="GroepPagina.php">Familie Pagina</a></li>
            <li><a href="AlleEvents.php">Evenementen</a></li>
            <li><a href="#">Voeg Mensen Toe</a></li>
        </ul>
    </nav>

	<div id="lijstEvents">
    
    	<div>
		<h1>Alle Evenementen</h1>
        <br>
		</div><!-- header -->
    
    	<div id="contentEvents">	
    	<ul>
		<?php
		//lijst met titels laten zien via deze for each lus
		foreach($events as $e)
		{
			echo 
			"<li>" . $e->title . "<br>" .
			 "<i>" . $e->city . "</i>" . "<br>" . $e->calendarsummary . "<br><br>" . $e->heading . "</i>" . 
			 "<a href='DetailEvents.php?id=" . $e->cdbid . "'>Meer Info</a>" . 
			 "</li><br>"; 
			// hier zorgen we ervoor dat de lijst titels, links worden, we linken naar de cultuur db id
		}
		?>
    	</ul>
		</div><!-- contentEvents -->

    </div><!-- einde lijstEvents -->

</body>
</html>