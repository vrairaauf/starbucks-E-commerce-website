<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>index</title>
</head>
<body>

<?php require "head.php"; ?>

<?php

if(isset($_GET['role']) && $_GET['role']=="admin"){
	if(isset($_GET['tache'])){
		if($_GET['tache']=="commandes"){
			require 'commandes.php';
		}elseif($_GET['tache']=="coffee"){
			require 'coffee.php';
		}elseif($_GET['tache']=="create"){
			require 'create_coffee.php';
		}elseif($_GET['tache']=="update"){
			require 'update_coffee.php';
		}
	}
}


?>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>