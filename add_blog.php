<?php
  include_once('config.php');

  $title=addslashes($_POST['title']);
  $detail=addslashes($_POST['detail']);
  $image = $_FILES['image']['name'];

  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) 
  {
    $uploadOk = 1;
  } 
  else 
  {
    $uploadOk = 0;
  }

  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  $sql="INSERT INTO blog (title,description,image) VALUES ('$title','$detail','$image')";
  if(mysqli_query($db,$sql)){
    echo 1;
  } 
  else 
  {
    echo 0;
  }
?>