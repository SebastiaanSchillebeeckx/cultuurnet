<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<!-- bron voor data opslagen in database en data eruit halen en printen
http://www.jonwelshdesigns.co/php/formdata-database
-->

<?php

	session_start();
	include 		"fbLogin/fbConnection/common.php";
	include_once 	"fbLogin/fbConnection/fbconnect.php";
	
	require_once 	"addGroup/add.php";


	// Via deze query roepen we de groepsnaam op uit de database
	$query = "SELECT CONCAT(groepnaam) 
	AS name FROM groepen";
	$result = @mysql_query ($query)
	
?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Familie Uit ID - Groep Selectie</title>

    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/kuk.css" media="all">



</head>

<body>


	<?php include_once("include_header.php") ?>
    
    <?php				
       		if (isset($_SESSION['user'])) 
			echo 
			'<div class="afmelden">
			<a href="logout.php">Logout</h5></a>
			</div>';
        	else echo '<a href="' . $loginUrl . '">Meld je aan met Facebook</a>';
	?>
    
	<?php 
			if(!isset($_SESSION['user'])) { ?>
			<a href='<?php echo $loginUrl ?>'>
	<?php } else { ?>
    
    
    <?php
        mysqlc();
        $groepInfo = GetSQLValueString($_SESSION['user'], "text");
        $query = sprintf("SELECT * FROM gebruikers WHERE email = %s",$groepInfo);
        $resultaat = mysql_query($query) or die('Query gefaald: ' . mysql_error() . "<br />\n$sql");
        $row = mysql_fetch_array($resultaat);
	?>
    
    
	<div class="welkom">
    <h2><?php echo "Welkom, " . ($row['name']) . " ! ";?></h2>
    </div>
    
    <?php //if(isset($_SESSION['id'])) { ?>
        	<!--<img src="https://graph.facebook.com/<?php // echo $_SESSION['id']; ?>/picture?type=large"/>-->
	<?php // } ?>


	<?php
       // echo "<b>   GENDER : </b>" . $row['gender'];
       // echo "<br/><b>   EMAIL : </b>" . $row['email'];
	   
	   // echo "<br>" . $row['gender'];
	   // echo "<br>" . $row['email'];
	?>	
    
    <div class="row" id="tabel">
    
    	<div class="half">
            <table class="width-100 hovered">
			<thead>
				<tr>
					<h3>Families</h3>
				</tr>
			</thead>
			<tbody>
            	<tr>
                	<td><?php 
						if ($result) 
						{
						while ($row = mysql_fetch_array ($result)) {
							echo '' . $row['name'] . '';
						}
						mysql_free_result ($result);
						} else {
						echo 
						'Er is iets misgelopen, we kunnen je famillie momenteel niet weergeven.';
						echo '<p>' . mysql_error() . '<br/><br/> Query: ' . $query . '</p>'; //debugging message
						}
						mysql_close();
						
					?></td>
                </tr>
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
    
    <?php } ?>	


    <?php include_once ("include_footer.php") ?>	



</body>
</html>