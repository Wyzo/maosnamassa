<?php
$target_dir = "../imagens/galeria/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5 * MB) {
  $uploadOk = 0;
}

if($imageFileType != "png") {
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    header("Location: ../dashboard?err=true");
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location: ../dashboard");
  } else {
    header("Location: ../dashboard?err=true");
  }
}
?>
