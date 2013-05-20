<?php

//BASE URL
$base_url = "http://localhost:78/cultuurnet/";

$db_hostname 	= 'localhost';
$db_database 	= 'cultuurnet';
$db_username 	= 'root';
$db_password 	= '';

// Connectie maken met server
$db_server = mysql_connect($db_hostname, $db_username, $db_password)
    or die("Er kon geen verbinding met MySQL gemaakt worden: " . mysql_error());
	
// Selecteer de database
mysql_select_db($db_database)
    or die("Er kon geen verbinding met de database gemaakt worden: " . mysql_error());
	
?>