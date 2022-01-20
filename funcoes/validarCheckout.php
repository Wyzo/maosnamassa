<?php

session_start();

$nomeCartao = $_POST["nomeCartao"];
$numCartao = $_POST["numCartao"];
$dataCartao = $_POST["dataCartao"];
$codigoSeguranca = $_POST["codigoSeguranca"];
$codpostal = $_POST["codigoPostal"];
$data_agora = date("Y-m-d");
$telefone = $_POST["telefone"];
/*
echo $data_agora . "<br/>";
echo $dataCartao . "<br/>";
echo preg_match('/^\d{4}(-\d{3})?$/', $codpostal) . "<br/>";
echo strlen(trim($codigoSeguranca)) . "<br/>";
echo strlen(trim($numCartao)) . "<br/>";*/

    
if(strlen(trim($codigoSeguranca)) != 3 or strlen(trim($numCartao)) != 16 or $dataCartao < $data_agora or strlen(trim($telefone)) != 9 or preg_match('/^\d{4}(-\d{3})?$/', $codpostal) != 1) 
{
    header("Location: ../checkout.php?err=true");
}
else
{
    unset ($_SESSION["PAGO"]);
    $_SESSION["PAGO"] = true;
    unset ($_SESSION["ENCOMENDA_ATIVA"]);
    $_SESSION["ENCOMENDA_ATIVA"] = false;
    header('location:../encomendavalida.php');
}
?>