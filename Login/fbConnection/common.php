<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<?php
		// connectie maken met de database
		function mysqlc()
		{
			$con=mysql_connect("localhost","root","");
			if(!$con)
			{
				die("Could not connect to MySQL");
			}
			mysql_select_db("cultuurnet",$con) or die ("could not open database");
		}
		
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) 
		: mysql_escape_string($theValue);
		
		switch ($theType) {
			case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "''";
			break;
			
			case "long":
			
			case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "''";
			break;
			
			case "double":
			$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "''";
			break;
			
			case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "''";
			break;
			
			case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
			
			}
			
		return $theValue;
		}
		
?>