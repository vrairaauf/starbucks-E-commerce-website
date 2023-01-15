<?php 
session_start();
require 'db_connection.php';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?role=customer&tache=home">Starbucks</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="?role=customer&tache=login">LogIn</a></li>
            <li><a class="dropdown-item" href="?role=customer&tache=signup">SignUp</a></li>
            <li><a class="dropdown-item" href="?role=customer&tache=home">Home</a></li>
            <?php if(isset($_SESSION['pannel'])) {?>
              <li><a class="dropdown-item" href="?role=customer&tache=pannel">Pannel</a></li>
            <?php }?>
            <?php if(isset($_SESSION['user'])) {?>
              <li><a class="dropdown-item" href="?role=customer&tache=logout">Logout</a></li>
            <?php }?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
