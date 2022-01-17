<?php

session_start();

/*
ADMIN

email: admin@gmail.com
pass:  admin123


UTILIZADOR

email: utilizador@gmail.com
pass: utilizador123

*/

$email = $_POST["email"];
$pass = $_POST["password"];

$_SESSION["TIPO_CONTA"] = "visitante";
$_SESSION["LOGADO"] = "false";
$_SESSION["email"] = $email;


if($email == "admin@gmail.com" && $pass = "admin123")
{
    header('location:../dashboard.php');
    $_SESSION["TIPO_CONTA"] = "admin";
    $_SESSION["LOGADO"] = "true";
}
else if($email == "utilizador@gmail.com" && $pass = "utilizador123")
{
    header('location:../index.php');
    $_SESSION["TIPO_CONTA"] = "utilizador";
    $_SESSION["LOGADO"] = "true";
}
else
{
    header("Location: ../login.php?err=true");
}

?>