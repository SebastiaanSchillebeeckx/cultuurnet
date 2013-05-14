<!-- referentie voor facebook login en connectie
http://artatm.com/2012/08/tutorial-integrate-database-based-facebook-connect-to-your-website/
-->

<?php
unset($_SESSION['user']); 
unset($_SESSION['fb_{142048125978994}_code']); 
unset($_SESSION['fb_{142048125978994}_access_token']); 
unset($_SESSION['fb_{142048125978994}_user_id']); 
header("Location:index.php"); 
exit();
?>