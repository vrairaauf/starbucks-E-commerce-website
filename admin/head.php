<?php 
session_start();
require dirname(__DIR__).'/db_connection.php';
if(!isset($_SESSION['admin'])){
  header("location: login.php");
}
?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Starbux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?role=admin&tache=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?role=admin&tache=commandes">Commandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?role=admin&tache=coffee">Coffee</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?role=admin&tache=create">New coffee</a></li>
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
           
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>