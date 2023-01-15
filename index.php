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

<?php include "head.php"; ?>
<?php if(isset($_GET['pannel'])){require "alert_success_add_product_to_pannel.php";} ?>
<?php 

 if(isset($_GET['role']) && $_GET['role']=="customer"){

	if(isset($_GET['tache']) && $_GET['tache']=="login"){
		include "login.php";
	}elseif (isset($_GET['tache']) && $_GET['tache']=="signup") {
		require "signup.php";

	}
	
	elseif(isset($_GET['tache']) && $_GET['tache']=="commande"){
		require 'alert.php';
		if(!isset($_SESSION['user'])){
			require "login.php";
		}
		else{
			if(isset($_GET['coffee'])){
				if(isset($_SESSION['pannel'])){
					
					$_SESSION['pannel']=$_SESSION['pannel']."+".$_GET['coffee'];
					
				}else{
					$_SESSION['pannel']=$_GET['coffee'];
				}
				header("location: ?role=customer&tache=home&pannel=true");
			}
			
		}
	}elseif(isset($_GET['tache']) && $_GET['tache']=="logout"){
		require "logout.php";
	}elseif(isset($_GET['tache']) && $_GET['tache']=="pannel"){
		require "pannel.php";
	}
	else{
		require "starbux.php";
	}

}else{
	include "starbux.php";
}	


?>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>