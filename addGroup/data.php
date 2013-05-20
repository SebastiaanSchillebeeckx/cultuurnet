<!-- referentie: http://www.jonwelshdesigns.co/php/formdata-database -->

<?php //data.php

		require_once '../config/config.php';
		
		// Haal de ingevulde velden uit het formulier
		$name = $_POST['groepnaam'];
		$info = $_POST['info'];	
		
		// Steek de data in de tabel groepen
		$sql="INSERT INTO groepen (groepnaam, info, registration_date)
		VALUES ('$name', '$info', NOW())";
		$result = mysql_query($sql);
		
		// foutafhandeling als de data in de database wordt gestoken
		if($result){
		header('Location: http://localhost:78/cultuurnet/GroepPagina.php');
		}
		else {
		echo "ERROR";
		}
		
		// close mysql
		mysql_close();
		
?> 