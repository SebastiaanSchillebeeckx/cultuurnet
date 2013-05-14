<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<?php

	    if(!isset($_SESSION['user']))   
    {   
        $app_id        = "142048125978994";   
        $app_secret    = "fa604c0e1789b752d23228d86cffda2a";   
        $site_url      = "http://localhost:78/cultuurnet/GroepSelectie.php"; 
		
		include "src/facebook.php";   
		$facebook = new Facebook(array(   
			'appId'		=> $app_id,   
			'secret'	=> $app_secret,   
		));   
		
		$user = $facebook->getUser();   
		
		if($user){   
		// Get logout URL   
			$logoutUrl = $facebook->getLogoutUrl();  
		}else{   
		// Get login URL   
			$loginUrl = $facebook->getLoginUrl(array(   
        	'scope'			=> 'read_stream, publish_stream, user_about_me, email',   
        	'redirect_uri'	=> $site_url,   
        ));   
		} 
		
			if($user){

		try{
		// Als de gebruiker alle permissies heeft toegestaan, ga je hier verder
			$user_profile = $facebook->api('/me');
		// Maak connectie met de database
		mysqlc();
		
			$name = GetSQLValueString($user_profile['name'], "text");
			$email = GetSQLValueString($user_profile['email'], "text");
			$gender = GetSQLValueString($user_profile['gender'], "text");
			$query = sprintf("SELECT * FROM gebruikers WHERE email = %s",$email);
			$res = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br />\n$sql");
		if(mysql_num_rows($res) == 0)
		{
			$iquery = sprintf("INSERT INTO gebruikers values('',%s,%s,%s,'yes')",$name,$email,$gender);
			$ires = mysql_query($iquery) or die('Query failed: ' . mysql_error() . "<br />\n$sql");
			$_SESSION['user'] = $user_profile['email'];
			$_SESSION['id'] = $user_profile['id'];
		}
		else
		{
			$row = mysql_fetch_array($res);
			$_SESSION['user'] = $row['email'];
			$_SESSION['id'] = $user_profile['id'];
		}
		}catch(FacebookApiException $e){
			error_log($e);
			$user = NULL;
			}
		
		}
	
	}

?>