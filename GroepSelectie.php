<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<!-- bron voor data opslagen in database en data eruit halen en printen
http://www.jonwelshdesigns.co/php/formdata-database
-->

<?php 

include_once("config/config.php");

?>

<?php

	session_start();
	include 		"Login/fbConnection/common.php";
	include_once 	"Login/fbConnection/fbconnect.php";
	
	// Via deze query roepen we de groepsnaam op uit de database
	$query = "SELECT CONCAT(groepnaam) 
	AS name FROM groepen";
	$result = @mysql_query ($query);

?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Familie Uit ID - Groep Selectie</title>

	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/scoirm.css" media="all">

</head>

<body>

	<?php include_once("include_header.php") ?>
    
	<?php include_once("include_gebruikerInfo.php") ?>
    
    <div class="row" id="tabel">
    
    	<div class="half">
            <table class="width-100 hovered">
			<thead>
				<tr>
					<h3>Families</h3>
				</tr>
			</thead>
			<tbody>
            	
                	<?php 
						if ($result) 
						{
						while ($row = mysql_fetch_array ($result)) {
						?>
                        <tr>	
                        <td>
                            <div>
                            	<a href="GroepPagina.php"><?php echo $row['name']; ?></a>
                            </div>
                        </td>
                        </tr>
			
						<?php
						}
						mysql_free_result ($result);
						} else {
						echo 
						'Er is iets misgelopen, we kunnen je familie momenteel niet weergeven.';
						echo '<p>' . mysql_error() . '<br/><br/> Query: ' . $query . '</p>'; 
						}
						mysql_close();
						
					?>
                    
                    </tbody>                          
			</table>
             <input type="button" class="btn" value="Groep Maken" onclick="location.href='GroepMaken.php'"/>
    	</div>
        
        <div class="half">
        	<table class="width-100 hovered">
			<thead>
				<tr>
					<h3>Uitnodigingen</h3>
				</tr>
			</thead>
			<tbody>
			</tbody>
			</table>
        </div>
        
    </div> <!-- einde row -->
    
    <?php include_once ("include_footer.php") ?>	
    
</body>

</html>
