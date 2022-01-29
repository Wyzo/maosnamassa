<?php

session_start();

require_once 'db.php';

$email = $_POST["EMAIL"];
$telefone = $_POST["TELEFONE"];
$nome = $_POST["NOME"];
$mensagem = $_POST["COMENT"];

function validaDados($email, $telefone, $nome, $mensagem)
{
    if ($email == null || $telefone == null || $nome == null || $mensagem == null || strlen($telefone) != 9) {
        return false;
    } else {
        return true;
    }
}

if (validaDados($email, $telefone, $nome, $mensagem) == true) {
    $sql = "INSERT INTO mensagens_ajuda (email_cliente, telefone, comentario, nome)
    VALUES ('$email', '$telefone', '$mensagem', '$nome')";
    if ($link->exec($sql)) {
        //Código executado com sucesso!
        header("Location: ../submit.php");
    }else {
        header("Location: ajuda.php?err=true");
    }
}
else {
    header("Location: ajuda.php?err=true");
}

unset($link);
?>