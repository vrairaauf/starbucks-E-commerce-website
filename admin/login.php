<?php session_start(); ?>
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

<?php 
require dirname(__DIR__).'/db_connection.php';
if(isset($_POST['submit'])){
if(isset($_POST['email']) && isset($_POST['password'])){
$request="SELECT * FROM Admins WHERE email=:email AND password=:password";
$response=$connex->prepare($request);
$params=array("email"=>$_POST["email"], "password"=>$_POST['password']);
$response->execute($params);
$rows=$response->fetchAll();
if(count($rows)>0){
  $_SESSION['admin']=$rows[0]['id'];
  header("location: index.php");
}else{
  require './alert.php';
}
}
}
?>

<form method="post">
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="password">
    </div>
  </div>
 
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="souvenir">
        <label class="form-check-label" for="gridCheck1">
          Me souvenir
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
</form>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>