<?php 

include_once('../addGroup/data.php');

$name = $_GET["groepname"];
$group = group($name);

var_dump($group);

?>