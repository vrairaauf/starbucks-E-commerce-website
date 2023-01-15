<?php 
if(isset($_POST['submit'])){
	$target_dir = "../image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

	$request="INSERT INTO Coffee SET name='".$_POST['name']."' , libelle='".$_POST['libelle']."' , image_name='image/".$_FILES['fileToUpload']['name']."', price=".$_POST['price'].", currency='".$_POST['currency']."'";
	$response=$connex->exec($request);
      if($response){
        require 'success_add_coffee.php';
      }
}
?>
<form method="post" enctype="multipart/form-data">
	
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
  <label for="floatingInput">Coffee Name</label>
</div>

<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="libelle"></textarea>
  <label for="floatingTextarea">Comments</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="price" name="price">
  <label for="floatingInput">Price </label>
</div>

<select class="form-select" aria-label="Default select example" name="currency">
  <option selected>Currency </option>
  <option value="$">$</option>
  <option value="£">£</option>
  <option value="TND">TND</option>
</select>



<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="fileToUpload">
  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
</div>


<div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Save</button>
</div>


</form>