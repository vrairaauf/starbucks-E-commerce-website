<?php 
if(isset($_POST['submit'])){
if(isset($_POST['checkTerm'])){
  if($_POST['password']==$_POST['confirmPassword']){
    if(strlen($_POST['name'])>0 && strlen($_POST['familyName'])>0 && strlen($_POST['email'])>0 && strlen($_POST['city'])>0 && strlen($_POST['address'])>0 && strlen($_POST['zipCode'])==5){
      //die("signup success");
      $request="INSERT INTO Users SET name='".$_POST['name']."', family_name='".$_POST['familyName']."' , email='".$_POST['email']."' , password='".$_POST['password']."' , city='".$_POST['city']."' , adress='".$_POST['address']."' , zip_code='".$_POST['zipCode']."' , created_at='".date("Y-m-d")."'";
      $response=$connex->exec($request);
      if($response){
        header("location: ?role=customer&tache=home");
      }
    }
  }
}
require 'alert.php';
}
?>
<br><br><br><br>
<form class="row g-3" method="post">
    <br><br><br><br>
    <div class="col-md-4">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationDefault01" value="Mark" required name="name">
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationDefault02" value="Otto" required name="familyName">
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2">@</span>
      <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required name="email">
    </div>
  </div>
  
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationDefault03" required name="city">
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault03" required name="address">
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationDefault05" required name="zipCode">
  </div>

  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationDefault02" value="" required name="password">
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="validationDefault02" value="" required name="confirmPassword">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required name="checkTerm">
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
  </div>
</form>