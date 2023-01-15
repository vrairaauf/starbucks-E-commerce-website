<?php 

if(isset($_GET['op'])){
  if($_GET['op']=="delete"){
    if(isset($_GET['id'])){
      $request="SELECT * FROM Coffee_Per_Commande WHERE coffee_id=:id";
      $response=$connex->prepare($request);
      $params=array("id"=>$_GET["id"]);
      $response->execute($params);
      $raws=$response->fetchAll();
      foreach($raws as $raw){
          $request="DELETE FROM Commandes WHERE id=:id";
          $response=$connex->prepare($request);
          $params=array("id"=>intval($raw['commande_id']));
          $result=$response->execute($params);
      }
      $request="DELETE FROM Coffee_Per_Commande WHERE coffee_id=:id";
      $response=$connex->prepare($request);
      $params=array("id"=>intval($_GET['id']));
      $result=$response->execute($params);
      /*if($result){
        $request="DELETE FROM Commandes WHERE id=:id";
        $response=$connex->prepare($request);
        $params=array("id"=>intval($_GET['id']));
        $result=$response->execute($params);
        */
        if($result){
          $request="DELETE FROM Coffee WHERE id=:id";
          $response=$connex->prepare($request);
          $params=array("id"=>intval($_GET['id']));
          $result=$response->execute($params);
          if($result){
             header("location: ?role=admin&tache=coffee");
          }
        }
    //}
    }
  }elseif($_GET['op']=="update"){
    header("location: ?role=admin&tache=update&id=".$_GET['id']);
  }
}

$request="SELECT * FROM Coffee";
$response=$connex->query($request);
$raws=$response->fetchAll();
$cmpt=1;
?>
<table class="table table-striped">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name </th>
      <th scope="col">Libellée </th>
      <th scope="col">Price</th>
      
      <th scope="col">Currency</th>
      <th scope="col">Image  </th>
      <th scope="col">Operation</th>

    </tr>
  </thead>
  <tbody> 
    <?php foreach($raws AS $raw){ ?>
      <tr>
        <td><?php  echo $cmpt;?></td>
        <td><?php echo $raw['name']; ?></td>
        <td><?php echo $raw['libelle']; ?></td>
        <td><?php echo  $raw['price'];?></td>
        <td><?php echo $raw['currency']; ?></td>
        <td><img width="50px" height="30px" src="../<?php echo $raw['image_name']; ?>" ></td>
        <td>
          <ul class="list-group">
            <?php
               echo "<a href='?role=admin&tache=coffee&op=delete&id=".$raw['id']."' class='btn btn-danger'>Delete</a>";
            ?>
            <?php
               echo "<a href='?role=admin&tache=coffee&op=update&id=".$raw['id']."' class='btn btn-warning'>Update</a>";
            ?>
          </ul>
        </td>
      </tr>
    <?php 
    $cmpt++;
    } 

  ?>
  </tbody>
</table>