    
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/scoirm.css" media="all">
    
	<div class="gebruikersInfo">
    <?php				
       		if (isset($_SESSION['user'])) 
			echo 
			'<div class="afmelden">
			<a class="afKnop" href="logout.php">afmelden</a>
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
        $resultaat = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br />\n$sql");
        $row = mysql_fetch_array($resultaat);
	?> </div>
    
    
	<div class="welkom">
    <h2><?php echo "Welkom, " . ($row['name']) . " ! ";?></h2>
    </div>
        
    <!--<?php //if(isset($_SESSION['id'])) { ?>
    		//<div class="profielAfbeelding">
        	//<img src="https://graph.facebook.com/<?php // echo $_SESSION['id']; ?>/picture?type=large"/>
            //</div>
	<?php //} ?>-->


	<?php
       // echo "<b>   GENDER : </b>" . $row['gender'];
       // echo "<br/><b>   EMAIL : </b>" . $row['email'];
	   
	   // echo "<br>" . $row['gender'];
	   // echo "<br>" . $row['email'];
	?>
    
    <?php } ?>
    </div>
	