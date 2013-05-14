<?php

	

	$url = "http://build.uitdatabank.be/api/events/search?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";
	
	$events = json_decode(file_get_contents($url)); 
	//haal alle info van de url, goedkope hosting weigeren dat soms, bang voor hacking
	//zit json in die url, we moeten daar een array van maken, dmv json_decode
	
	


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Alle Events</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="css/kuk.css" media="all">
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    
</head>

<body>

	<div data-role="page">
    
    	<div data-role="header">
		<h1>Alle Events</h1>
		</div><!-- /header -->
    
    	<div data-role="content">	


    
    	<ul data-role="listview">
		<?php
		//lijst met titels laten zien via deze for each lus
		foreach($events as $e)
		{
			echo "<li><a href='DetailEvents.php?id=" . $e->cdbid . "'>" . $e->title . "<i> in </i>" .
			 "<i>" . $e->city . "</i>" . " in de categorie:<i>" . $e->heading . "</i>" . "</a></li>"; 
			// hier zorgen we ervoor dat de lijst titels, links worden, we linken naar de cultuur db id
		}
		?>
    	</ul>


		</div><!-- /content -->

    </div><!-- /page -->



    
    
</body>
</html>