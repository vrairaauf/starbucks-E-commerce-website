<?php 
$connex=new PDO("mysql:host=localhost;dbname=starbux","root","");
if($connex==null)
	die("no connexion with database");
?>