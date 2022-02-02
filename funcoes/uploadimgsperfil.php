<?php
require_once 'db.php';
session_start();
$target_dir = "../imagens/profilepics/";
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

if ($uploadOk == 0) {
    header("Location: ../perfil.php?err=true");
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {

        $nomet =  $_FILES["fileToUpload"]["name"];
        $email = $_SESSION["email"];

        $sql = "SELECT * FROM Utilizadores WHERE email='$email'";

        $result = $link->query($sql);

        $row = $result->fetch();
        $teste = $row["profile_pic_img"];
        $sql = "UPDATE Utilizadores SET profile_pic_img = null WHERE email ='$email'";
        unlink("../imagens/profilepics/$teste");

        $sql = "UPDATE Utilizadores SET profile_pic_img = '$nomet' WHERE email ='$email'";
        $result = $link->exec($sql);
        header("Location: ../perfil.php");

  } else {
    header("Location: ../perfil.php?err=true");
  }
}
?>
