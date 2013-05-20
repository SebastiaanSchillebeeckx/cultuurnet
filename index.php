<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<?php

	session_start();
	include 		"Login/fbConnection/common.php";
	include_once 	"Login/fbConnection/fbconnect.php";
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Aanmelden</title>

    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/screenIn.css" media="all">

</head>

<body>

	<?php include_once("include_header.php") ?>



    <div class="afbeelding">
        <div class="aanmelden">
			<?php				
                    if (isset($_SESSION['user'])) echo '<a class="afKnop" href="logout.php">Logout</h5></a>';
                    else echo 
                    '<h2>Welkom op de Familie Uit ID!</h2>
                    <p>Meld je aan met:</p>
                    <a class="fbKnop" href="' . $loginUrl . '">Facebook</a>';
            ?>
                    <br>
                    <br>
                    <a class="mailKnop" href="#">Email</a>
                    <br>
                    <br>
                    <p>Nog geen account? Registreer jezelf <a class="hierKnop" href="#">hier</a> !</p>
        </div>
    </div>
    
	<?php 
			if(!isset($_SESSION['user'])) { ?>
			<a href='<?php echo $loginUrl ?>'>
	<?php } else { ?>
    
    
	<?php
        mysqlc();
        $email = GetSQLValueString($_SESSION['user'], "text");
        $query = sprintf("SELECT * FROM gebruikers WHERE email = %s",$email);
        $res = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br />\n$sql");
        $row = mysql_fetch_array($res);
	?> </div>

	<?php } ?>	
    
    <div class="row" id="homeTekst">
    	<div class="third">
        <h3>Wat is de Familie Uit ID?</h3>  
        <p>Met de Familie Uit ID kan je op een eenvoudige manier opzoek gaan naar culturele evenementen die ideaal geschikt 
        zijn voor je familie. Je hoeft het internet niet meer af te schuimen op zoek naar het juiste evenement, via 
        deze webapplicatie kan je op een eenvoudige manier opzoek gaan naar datgene wat je wil!</p>
        </div>
        
    	<div class="third">
        <h3>Hoe werkt het?</h3>
        <p>Nadat je jezelf hebt aangemeld met je Facebook account kan je een groep aanmaken. Je kan mensen uitnodigen om lid
        te worden van je groep en zo je eigen culturele familie creëren. Alle evenementen komen uit de CultuurNet Databank,
        deze databank is rijk gevuld met evenementen. Via een zoekveld kan je zelfs specifieke zoekopdrachten
        uitvoeren.
        </div>
        
    	<div class="third">
        <h3>Waarom zou je het gebruiken?</h3>
        <p>Deze tijd is er een overbod aan informatie en daardoor is het moeilijk om de juiste informatie te vinden, via deze 
        webapplicatie vind je de juiste informatie terug over alle evenementen die je wilt bezoeken. Je kan ook op een
        eenvoudige en interactieve manier communiceren met je Familie omtrent het bezoeken van evenementen.
        </div>
    </div> <!-- einde row -->
    
</body>
</html>