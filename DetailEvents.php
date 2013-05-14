<?php

		if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		}
		$url = "http://build.uitdatabank.be/api/event/" . $id . "?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";
		//haal de $id van elk event, zodat je de titel en beschrijving per event te zien krijgt
		$event = json_decode(file_get_contents($url));
		
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Event Details</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    
</head>

<body>

<div data-role="page">
    
    	<div data-role="header">
		<h1>Alle Events</h1>
		</div><!-- /header -->
    
    	<div data-role="content">	

		<!-- laat titel en beschrijving zien -->
        <h1><?php echo $event->event->eventdetails->eventdetail->title; ?></h1>
      	<p><?php echo $event->event->eventdetails->eventdetail->shortdescription; ?></p>
      	<p><?php echo $event->event->eventdetails->eventdetail->calendarsummary; ?></p>
        
        <!--afbeelding laten zien -->
		<?php $images = $event->event->eventdetails->eventdetail->media->file; 
		foreach($images as $image)
		{
			if($image->mediatype == "photo")
			{
				echo "<img src='" . $image->hlink . "' />";
			}
		}
		?>
        
        </div><!-- /content -->

</div><!-- /page -->



</body>
</html>