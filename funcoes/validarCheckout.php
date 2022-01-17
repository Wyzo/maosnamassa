<?php

session_start();

$met = $_GET["metodo"];

if($met == "paypal")
{
    unset ($_SESSION["PAGO"]);
    $_SESSION["PAGO"] = true;
    unset ($_SESSION["ENCOMENDA_ATIVA"]);
    $_SESSION["ENCOMENDA_ATIVA"] = false;
    header("Location: ../encomendavalida.php");
}
else if($met == "mbway")
{
    if(empty($_POST["CODIGO"]))
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
}

?>