<?php

session_start();

$_SESSION["tipoBOLO"] = filter_input(INPUT_POST, 'TIPO_BOLO', FILTER_SANITIZE_STRING);
$_SESSION["tipoMASSA"] = filter_input(INPUT_POST, 'TIPO_MASSA', FILTER_SANITIZE_STRING);
$_SESSION["tipoRECHEIO"] = filter_input(INPUT_POST, 'TIPO_RECHEIO', FILTER_SANITIZE_STRING);
$_SESSION["DETALHES"] = filter_input(INPUT_POST, 'DETALHES', FILTER_SANITIZE_STRING);

if(empty($_SESSION["DETALHES"]))
{
    header("Location: ../encomendar?err=true");
}
else
{
    $_SESSION["ENCOMENDA_ATIVA"] = true;
    $_SESSION["PAGO"] = false;
    header('location:../checkout');
}


?>