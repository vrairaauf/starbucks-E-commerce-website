<?php 
if(isset($_POST['submit'])){
if(isset($_POST['email']) && isset($_POST['password'])){
$request="SELECT * FROM Users WHERE email=:email AND password=:password";
$response=$connex->prepare($request);
$params=array("email"=>$_POST["email"], "password"=>$_POST['password']);
$response->execute($params);
$rows=$response->fetchAll();
if(count($rows)>0){
  $_SESSION['user']=$rows[0]['id'];
  header("location: ?role=customer&tache=home");
}else{
  require 'alert.php';
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