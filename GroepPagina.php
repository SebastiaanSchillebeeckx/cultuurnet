<?php

	session_start();
	include 		"fbLogin/fbConnection/common.php";
	include_once 	"fbLogin/fbConnection/fbconnect.php";

	require_once 	"addGroup/add.php";

	// Via deze query roepen we de groepsnaam op uit de database
	$query = "SELECT CONCAT(groepnaam) 
	AS name FROM groepen";
	$result = @mysql_query ($query)

?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Groeps Pagina</title>

	<script type="text/javascript" src="js/app.js"></script>
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/kuk.css" media="all">

</head>

<body>

	<?php include_once("include_header.php") ?>
    
  	<?php include_once ("include_gebruikerInfo.php") ?>

    <nav class="nav-tabs">
        <ul>
            <li><a href="GroepPagina.php">Home</a></li>
            <li><a href="GroepSelectie.php">Selecteer Familie</a></li>
            <li><a href="FamilieLeden.php">Familie Leden</a></li>
            <li><a href="#">Voeg Mensen Toe</a></li>
        </ul>
    </nav>
    
    <div class="row" id="famHead">
   		<div class="half">
        
        <?php 
		if ($row = mysql_fetch_array ($result))
			echo '<h2>' . $row['name'] . '</h2>'; 

		?>
        </div>
    </div> <!-- einde row -->
    
    <div class="row" id="titels">
   		<div class="half">
        <h3>Aanbevelingen voor de familie</h3>
        <img src="img/kickx.jpg"/>
        <p>Klik <a href="#">hier</a> voor meer info</p>
        </div>
        
        <div class="half">
        	<span class="btn-group">
            <p>Zoeken naar Evenementen</p>
    		<input type="text" name="foo" class="input-search" />
   			<button class="btn btn-round">Zoek</button>
            <br>
            <br>
            <br>
            <br>
            <input type="button" class="btn" value="Alle Evenementen weergeven" onclick="location.href='AlleEvents.php'"/>
			</span>
        </div>
    </div> <!-- einde row -->    
    
    <div class="row" id="titels">
    
    	<div class="half">
        
        <h3>Voorstellen</h3>
        
        <img src="img/kickx.jpg"/>
        
            <div id="meerInfo">
            <p>	Voorgesteld door Sebastiaan </p>
           
            <p>Klik <a href="#">hier</a> voor meer info</p>
            <button class="btn">Aanwezig</button>  
            <br>
            <br>
            
            <p>Hoera, 4 familieleden willen gaan!
            <br>
            Jammer, 2 familieleden willen niet gaan.</p>
            
            <button class="btn">Voeg toe aan Kalender</button>
    
            
            </div><!-- einde meerInfo -->
        
     	</div> <!-- einde half -->
        
        <div class="half">
        <p>Kalender</p>
        <li>27/04 Test Event</li>
        <li>06/05 Test Eventje</li>
        </div> <!-- einde half -->
        
    </div><!-- einde row-->
    
	<?php include_once ("include_footer.php") ?>
    
</body>
</html>