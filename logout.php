<?php 
unset($_SESSION['user']);
if(isset($_SESSION['pannel']))
{
	unset($_SESSION['pannel']);
}
session_destroy();
header("location: ?role=customer&tache=home");
?>