<?php

		session_start();
		include 		"Login/fbConnection/common.php";
		include_once 	"Login/fbConnection/fbconnect.php";
		require_once 	"config/config.php";
	
		// Via deze query roepen we de groepsnaam op uit de database
		$query = "SELECT CONCAT(groepnaam) 
		AS name FROM groepen";
		$result = @mysql_query ($query);
		

		//haal de $id van elk event, zodat je de titel en beschrijving per event te zien krijgt
		if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		}
		$url = "http://build.uitdatabank.be/api/event/" . $id . "?key=AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9&format=json";

		$event = json_decode(file_get_contents($url));
		
		error_reporting(0);
		
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Event Details</title>

	<script type="text/javascript" src="js/app.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>  

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
        
                
                <div id="detailEvents">	
       			<a href="AlleEvents.php"> &lsaquo; Terug naar alle events</a>
                <br>
                <br>
                <!-- laat titel en beschrijving zien -->
                <div id="voorsteller">
                <h3><?php echo $event->event->eventdetails->eventdetail->title; ?></h3>
                <button id= "test" class="btn">Evenement Voorstellen</button>
                <div id="klik"><span>Evenement voorgesteld!</span></div>
                
                <script>
					$("button").click(function () {
					$(this).fadeOut();
					$("div").fadeIn(3000, function () {
					$("span").fadeIn(100);
					});
					});
				</script>
                
				</div><!-- einde voorsteller -->
                <br>
                <br>
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
                
                </div><!-- contentEvents -->
        
        </div><!-- lijstEvents -->



</body>
</html>