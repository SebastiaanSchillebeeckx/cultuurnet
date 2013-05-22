<?php

	session_start();
	include 		"Login/fbConnection/common.php";
	include_once 	"Login/fbConnection/fbconnect.php";

	require_once 	"config/config.php";

	// Via deze query roepen we de groepsnaam op uit de database
	$query = "SELECT CONCAT(groepnaam) 
	AS name FROM groepen";
	$result = @mysql_query ($query)
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Familie Leden</title>

	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/scihjkhgrm.css" media="all">
    
</head>

<body>

	<?php include_once("include_header.php") ?>
    
  	<?php include_once ("include_gebruikerInfo.php") ?>

    <nav class="nav-tabs">
        <ul>
            <li><a href="GroepSelectie.php">Selecteer Familie</a></li>
            <li><a href="GroepPagina.php">Familie Pagina</a></li>
            <li><a href="AlleEvents.php">Evenementen</a></li>
            <li><a href="FamilieLeden.php">Familie Leden</a></li>
            <li><a href="#">Voeg Mensen Toe</a></li>
        </ul>
    </nav>
    
    <div class="row">
		<div class="half" id="leden">
        <h3>Leden van de Familie</h3>
		<?php echo "" . ($row['name']) . "<br>" . ($row['email']) . " ";?>
        <br>
    	</div>
    </div>
    
	<?php include_once ("include_footer.php") ?>
    
</body>
</html>