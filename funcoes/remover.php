<?php
session_start();
require_once 'db.php';
$id = $_GET["id"];

$email = $_SESSION["email"];
//Obter o id do carrinho e o id do utilizador

$sql = "SELECT * FROM Utilizadores WHERE email = '$email'";
$result = $link->query($sql);
$row = $result->fetch();

$id_utilizador = $row["id"];
unset($sql);

$sql = "SELECT * FROM carrinho WHERE id_utilizador = $id_utilizador";
$result = $link->query($sql);
$row = $result->fetch();
$id_carrinho = $row["id"];

$sql = "DELETE FROM carrinho_compras WHERE id_carrinho = $id_carrinho and id = $id";
$result = $link->query($sql);

header("Location: ../index");

?>