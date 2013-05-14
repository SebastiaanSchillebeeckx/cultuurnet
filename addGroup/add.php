<!-- referentie: http://www.jonwelshdesigns.co/php/formdata-database -->

<?php 
$db_hostname = 'localhost';
$db_database = 'lesphp';
$db_username = 'root';
$db_password = '';

// Connectie maken met server
$db_server = mysql_connect($db_hostname, $db_username, $db_password)
    or die("Unable to connect to MySQL: " . mysql_error());
	
// Selecteer de database
mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());

?>