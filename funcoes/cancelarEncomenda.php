<?php

session_start();

$_SESSION["ENCOMENDA_ATIVA"] = false;
$_SESSION["PAGO"] = false;

unset ($_SESSION["tipoBOLO"]);
unset ($_SESSION["tipoMASSA"]);
unset ($_SESSION["tipoRECHEIO"]);
unset ($_SESSION["DETALHES"]);

header("Location: ../index.php");

?>