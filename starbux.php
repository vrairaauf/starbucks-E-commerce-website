<?php 
$request="SELECT * FROM Coffee";
$execute=$connex->query($request);
$statement=$execute->fetchAll();

?>
<div class="container-fluid overflow-hidden text-center">
  <div class="row gx-2">
 <?php foreach($statement AS $row){ ?>

<div class="card" style="width: 25rem;">
  <?php echo "<img src=".$row['image_name']." style='height:200px;' class='card-img-top' alt'...'>"; ?>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
    <p class="card-text"><?php echo $row['libelle']." <br>".$row['price'].' '.$row['currency'];?>.</p>

    <?php echo "<a href=?role=customer&tache=commande&coffee=".$row['id']." class='btn btn-primary'>Buy</a>";?>
  </div>
</div>

 <?php }?>
</div></div>