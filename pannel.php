<?php 

function clear_pannel(){
	if(isset($_SESSION['pannel']))
		unset($_SESSION['pannel']);
}
if(isset($_GET['action']) && $_GET['action']=="clear_pannel"){
		clear_pannel();
		header("location: index.php");
}



if(isset($_SESSION['pannel'])){

	function total_coffie($price, $quantity){
		return $price*$quantity;
	}

	$coffies=explode("+",$_SESSION['pannel']);
	$coffies=array_unique($coffies);
	if(isset($_POST['submit'])){
		$price=0;
		foreach($coffies AS $key=>$coffie){
			$price+=total_coffie(floatval($_POST['price'.$coffie]), intval($_POST['quantity'.$coffie]));
		}
		$request="INSERT INTO Commandes SET customer_id=".$_SESSION['user'].", price=".$price." , created_at='".date("Y-m-d H:m:s")."'";
		$response=$connex->exec($request);
		if($response){
			$request="SELECT MAX(id) AS 'last_id' FROM Commandes";
			$execute=$connex->query($request);
			$statement=$execute->fetchAll();
			$commande_id=$statement[0]['last_id'];
			//die($commande_id);
			foreach($coffies AS $key=>$coffie){
				$request="INSERT INTO Coffee_Per_Commande SET quantity=".intval($_POST['quantity'.$coffie])." , coffee_id=".$coffie." , commande_id=".$commande_id;
				$response=$connex->exec($request);
			}
			unset($_SESSION['pannel']);
			require 'success_commande.php';
		}

	}
}
if(isset($_SESSION['pannel'])){
	

?>
<div class="container-fluid overflow-hidden text-center">
  <div class="row gx-4">

  	<form method="post" class="row gx-4">
	  <br>
	  <br>
<?php 
foreach ($coffies AS $key=>$one_coffie) {
	$request="SELECT * FROM Coffee WHERE id=:id";
	$response=$connex->prepare($request);
	$params=array("id"=>intval($one_coffie));
	$response->execute($params);
	$rows=$response->fetchAll();
	foreach($rows AS $row){
?>

<div class="card" style="width: 25rem;">
  <?php echo "<img src=".$row['image_name']." style='height:200px;' class='card-img-top' alt'...'>"; ?>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
    <div class="col-md-4">
   <?php echo "<label for=\"price".$row['id']."\" class=\"form-label\">Price</label> "; ?>

    <?php echo "<input type='text' min='1' class='form-control' id='price" .$row['id']. "' readonly name='price".$row['id']."' value='".$row['price']."'>";?>
  </div>
   <div class="col-md-4">
   <?php echo "<label for=\"quantity".$row['id']."\" class=\"form-label\">Quantity</label> "; ?>

    <?php echo "<input type='number' min='1' class='form-control' id='quantity" .$row['id']. "' required name='quantity".$row['id']."' value='1'>";?>
  </div>
  </div>
</div>

<?php
	}
}

	  ?>


	  <div class="col-12">
	  	
	  	  <a class="btn btn-danger" href="?role=customer&tache=pannel&action=clear_pannel">clear pannel</a>
    		<button class="btn btn-primary" type="submit" name="submit">Commande</button>
  	</div>
	</form>


  </div>
 </div>

 <?php }?>