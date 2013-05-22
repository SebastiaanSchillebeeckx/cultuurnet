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
<title>Familie Uit ID - Groeps Pagina</title>

	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
    
	<script type="text/javascript" src="js/app.js"></script>

    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/scihjkhgrm.css" media="all">
    
    <script>
		function addKalender(){
		document.getElementById("add").innerHTML="Iron Man 3";
	}
	</script>

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
    
    <div class="row" id="famHead">
   		<div class="half">
        
        <?php 
		if ($row = mysql_fetch_array ($result))
			echo '<h2>' . $row['name'] . '</h2>'; 
		?>
        
        </div>
    </div> <!-- einde row -->
    
    <div class="row" id="titels">
    
    	<div class="half" id="voorstel">
        
        <h3>Voorstellen</h3>
        
           <div id="meerInfo">
           
           <form action="#" method="post">
                <select name="presence2[]">
                    <option value="wil gaan!">Ja, ik wil gaan!</option>
                    <option value="wil niet gaan.">Nee, ik wil niet gaan.</option>
                    <option value="weet het nog niet.">Ik weet het nog niet</option>
                </select><br>
                <input type="submit" class="btn-small" name="" value="ok" >
            </form> 
            
            <p>	 City Kickx
            <br> Turnhout 
            <br> 27/04/2013 
            <br> <a href="#">Meer Info</a> 
            </p>
            
            <br>
            
            <button class="btn">Voeg toe aan To-Do List</button>
            <button class="btn">Afspreken</button>
        
           </div><!-- einde meerInfo -->
           
         <br>
            
           <div id="meerInfo">
           
           <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
                <select name="presence[]">
                    <option value="wil gaan!">Ja, ik wil gaan!</option>
                    <option value="wil niet gaan.">Nee, ik wil niet gaan.</option>
                    <option value="weet het nog niet.">Ik weet het nog niet</option>
                </select><br>
                <input type="submit" class="btn-small" name="aanwezig" value="ok" >
            </form>
                       
            <p>	 Iron Man 3
            <br> Bree 
            <br> 25/05/2013 
            <br>
            <a href="http://localhost:78/cultuurnet/DetailEvents.php?id=8837fa77-cecc-4dc4-92cb-bb998edda429">Meer Info</a>
            </p>
            
            <?php include ("include_stemmen.php")?>

            <br>
          
            <button onclick="addKalender()" class="btn">Voeg toe aan To-Do List</button>
            <button onclick="location.href='afspreken.php'" class="btn">Afspreken</button>
    
           </div><!-- einde meerInfo -->           
     	</div> <!-- einde half -->
        
		<div class="half">
        	<span class="btn-group">
            <p class="bold">Zoeken naar Evenementen</p>
    		<input type="text" name="foo" class="input-search" />
   			<button class="btn btn-round">Zoek</button>
            <br>
            <br>
            <br>
			</span>
            <br>
            <br>
            <br>
            <p class="bold">To-Do List (klik op de evenementen voor meer info)</p>
            	<ul>
                    <li>Mano Mundo</li>
                	<li>
                    <a href="http://localhost:78/cultuurnet/DetailEvents.php?id=8837fa77-cecc-4dc4-92cb-bb998edda429" 
                    id="add">
                    </a>
                </ul>
            
        </div> <!-- einde half -->
        
    </div><!-- einde row-->
    
	<?php include_once ("include_footer.php") ?>
    
</body>
</html>