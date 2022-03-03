<?php

require_once 'db.php';

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$morada = $_POST["morada"];
$password = $_POST["password"];

$sql = "SELECT * FROM utilizadores WHERE email='$email'";

if ($result = $link->query($sql)) {
    if ($result->rowCount() > 0) {
        header("Location: ../registar?err=true");
    }
    else{
        $sql_inserir = "INSERT INTO utilizadores (nome, sobrenome, morada, telefone, email, password) 
        VALUES ('$nome', '$sobrenome', '$morada', '$telefone', '$email', '$password')";

        if ($link->exec($sql_inserir)) {
            header("Location: ../index");
            $_SESSION["TIPO_CONTA"] = "admin";
            $_SESSION["LOGADO"] = "true";
            $_SESSION["email"] = $email;
        }
        else {
            header("Location: ../registar?err=true");
        }
    }
}
unset($link);
?>