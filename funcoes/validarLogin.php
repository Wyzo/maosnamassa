<?php

session_start();

$utilizadores = [
    "admin@gmail.com" => "admin123",
    "utilizador@gmail.com" => "utilizador123"
];


if(isset($_POST["email"]) && !isset($_SESSION["email"])){
    if($utilizadores[$_POST["email"]] == $_POST["password"]){

        $_SESSION["email"] = $_POST["email"];
    }

    if(!isset($_SESSION["email"]))
    {
        $erro = true;
    }
}

if(isset($_SESSION["email"])){
    if($_SESSION["email"] == "admin@gmail.com"){
        header('location:../dashboard.php');
        $_SESSION["TIPO_CONTA"] = "admin";
        $_SESSION["LOGADO"] = "true";
    }
    else if($_SESSION["email"] == "utilizador@gmail.com"){
        header('location:../index.php');
        $_SESSION["TIPO_CONTA"] = "utilizador";
        $_SESSION["LOGADO"] = "true";
    }
}

if($erro == true){header("Location: ../login.php?err=true");}

/*
if($existeUtilizador)
{
    if($email == "admin@gmail.com" and $pass == "admin123")
    {
        header('location:../dashboard.php');
        $_SESSION["TIPO_CONTA"] = "admin";
        $_SESSION["LOGADO"] = "true";
    }
    else if($email == "utilizador@gmail.com" and $pass == "utilizador123")
    {
        header('location:../index.php');
        $_SESSION["TIPO_CONTA"] = "utilizador";
        $_SESSION["LOGADO"] = "true";
    }
}

if($email == "admin@gmail.com" and $pass == "admin123")
{
    header('location:../dashboard.php');
    $_SESSION["TIPO_CONTA"] = "admin";
    $_SESSION["LOGADO"] = "true";
}
else if($email == "utilizador@gmail.com" and $pass == "utilizador123")
{
    header('location:../index.php');
    $_SESSION["TIPO_CONTA"] = "utilizador";
    $_SESSION["LOGADO"] = "true";
}
else
{
    header("Location: ../login.php?err=true");
}
*/
?>