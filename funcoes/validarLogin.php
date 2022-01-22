<?php

session_start();

function verificarEmail($utilizadores){
    $utilizadores = [
        "admin@gmail.com" => "admin123",
        "utilizador@gmail.com" => "utilizador123"
    ];
    if(isset($_POST["email"]) && !isset($_SESSION["email"])){
        if($utilizadores[$_POST["email"]] == $_POST["password"]){
    
            return false;
        }
    
        if(!isset($_SESSION["email"]))
        {
            return true;
        }
    }
}

if(verificarEmail($_POST["email"]) == true){
    header("Location: ../login.php?err=true");
}else{
    $_SESSION["email"] = $_POST["email"];
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
}

?>
