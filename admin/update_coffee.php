<?php 
if(isset($_POST['submit'])){

    $request="UPDATE Coffee SET name='".$_POST['name']."' , libelle='".$_POST['libelle']."' , price=".$_POST['price'].", currency='".$_POST['currency']."' WHERE id=:id";


    $response=$connex->prepare($request);
    $params=array("id"=>intval($_GET['id']));
    $response->execute($params);
    $result=$response->fetchAll();
    if(count($result)>0){
      require 'success_add_coffee.php';
    }



}
$request="SELECT * FROM Coffee WHERE id=:id";
$response=$connex->prepare($request);
$params=array('id'=>$_GET['id']);
$response->execute($params);
$raws=$response->fetchAll();
?>
<form method="post">
	
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="<?php echo $raws[0]['name'];?>">
  <label for="floatingInput">Coffee Name</label>
</div>

<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="libelle" >
    <?php echo $raws[0]['libelle'];?>

  </textarea>
  <label for="floatingTextarea">Comments</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="price" name="price" value="<?php echo $raws[0]['price'];?>">
  <label for="floatingInput">Price </label>
</div>

<select class="form-select" aria-label="Default select example" name="currency">
  <option selected>Currency </option>
  <option value="$">$</option>
  <option value="£">£</option>
  <option value="TND">TND</option>
</select>






<div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Update</button>
</div>


</form>