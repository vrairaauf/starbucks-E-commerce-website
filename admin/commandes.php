<?php 
if(isset($_GET['op'])){
  if($_GET['op']=="delete"){
    if(isset($_GET['id'])){
      $request="DELETE FROM Coffee_Per_Commande WHERE commande_id=:id";
      $response=$connex->prepare($request);
      $params=array("id"=>intval($_GET['id']));
      $result=$response->execute($params);
      if($result){
        $request="DELETE FROM Commandes WHERE id=:id";
        $response=$connex->prepare($request);
        $params=array("id"=>intval($_GET['id']));
        $result=$response->execute($params);
        
        if($result){
          header("location: ?role=admin&tache=commandes");
        }
    }
    }
  }elseif($_GET['op']=="deliver"){
    $request="UPDATE Commandes SET delivred='oui', created_at='".date("Y-m-d H:m:s")."' , delivred_by=".$_SESSION['admin']." WHERE id=:id";
    $response=$connex->prepare($request);
    $params=array("id"=>intval($_GET['id']));
    $response->execute($params);
    $result=$response->fetchAll();
    if(count($result)>0){
      header("location: ?role=admin&tache=commandes");
    }
  }
}
$request="SELECT * FROM Commandes";
$response=$connex->query($request);
$rows=$response->fetchAll();
$cmp=1;
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">customer </th>
      <th scope="col">address </th>
      <th scope="col">coffees</th>
      <th scope="col">price</th>
      <th scope="col">date of commande</th>
      <th scope="col">delivred ?</th>
      <th scope="col">-------</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($rows AS $row){ ?>
      <?php 
      $request="SELECT * FROM Users WHERE id=:id";
      $response=$connex->prepare($request);
      $params=array("id"=>$row['customer_id']);
      $response->execute($params);
      $customer_raw=$response->fetchAll();
      ?>
      <tr>
        <th scope="row"><?php echo $cmp;?></th>
        <td><?php echo $customer_raw[0]['name']." ".$customer_raw[0]['family_name']; ?></td>
        <td>
          <?php echo $customer_raw[0]['zip_code']." ".$customer_raw[0]['city']." ".$customer_raw[0]['adress']; ?>
            
        </td>
        <?php 

        $request="SELECT * FROM Coffee_Per_Commande WHERE commande_id=:id";
        $response=$connex->prepare($request);
        $params=array("id"=>$row['id']);
        $response->execute($params);
        $commande_coffee_raws=$response->fetchAll();
        echo "<td>";
        echo "<ul class='list-group'>";
        //echo "<ul class='dropdown-menu'>";
        foreach($commande_coffee_raws AS $commande_coffee_raw){
            $request="SELECT * FROM Coffee WHERE id=:id";
            $response=$connex->prepare($request);
            $params=array("id"=>$commande_coffee_raw['coffee_id']);
            $response->execute($params);
            $coffee_raws=$response->fetchAll();
        ?>
         <li class='list-group-item'><?php echo $coffee_raws[0]['name']." <h5>".$commande_coffee_raw['quantity']."</h5>"; ?></li>
        <?php
        }
        ?>
          </ul>
        </td>
        <td><?php echo $row['price']." TND"; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
          <?php 
          if($row['delivred']=='non'){ 
            echo "<a href='?role=admin&tache=commandes&op=deliver&id=".$row['id']."' class='btn btn-primary'>Delivred</a>";
          }else{
            echo "<button type='button' class='btn btn-secondary'>yes</button>";
          } 
          ?>
        </td>
        <td>
          <ul class="list-group">
            <li class="list-group-item">
              <?php
               echo "<a href='?role=admin&tache=commandes&op=delete&id=".$row['id']."' class='btn btn-danger'>Delete</a>";
              ?>
                
            </li>
          </ul>
        </td>
      </tr>
    <?php $cmp++;?>
    <?php } ?>
    
  </tbody>
</table>