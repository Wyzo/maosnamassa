<?php

session_start();

$email = $_POST["EMAIL"];
$telefone = $_POST["TELEFONE"];
$nome = $_POST["NOME"];
$mensagem = $_POST["COMENT"];

function validarMensagem($email, $telefone, $nome, $mensagem)
{
    if ($email == null || $telefone == null || $nome == null || $mensagem == null || strlen($telefone) != 9) {
        return false;
    }
    else
    {
        return true;
    }
}

if (validarMensagem($email, $telefone, $nome, $mensagem) == false) {
    header("Location: ../ajuda.php?err=true");
} else {
    header("Location: ../submit.php");
}
