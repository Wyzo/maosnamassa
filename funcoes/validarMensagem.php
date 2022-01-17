<?php

session_start();

$email = $_POST["EMAIL"];
$telefone = $_POST["TELEFONE"];
$nome = $_POST["NOME"];
$mensagem = $_POST["COMENT"];

if ($email == null || $telefone == null || $nome == null || $mensagem == null || strlen($telefone) != 9)
{
    header("Location: ../ajuda.php?err=true");
}

else
{
    header("Location: ../submit.php");
}

?>