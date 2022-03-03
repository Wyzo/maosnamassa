<?php
session_start();

$email = $_SESSION["email"];
require_once 'funcoes/carrinho';

$sql = "SELECT * FROM utilizadores WHERE email = '$email'";
$result = $link->query($sql);
$row = $result->fetch();
$id = $row["id"];
unset($sql);


$sql = "SELECT * FROM carrinho WHERE id_utilizador = $id";
$result = $link->query($sql);
$row = $result->fetch();
$idcarrinho = $row["id"];
unset($sql);

$sql = "SELECT * FROM carrinho_compras WHERE id_carrinho = $idcarrinho";
$result = $link->query($sql);

if ($result->rowCount() > 0)
{
    while($row = $result->fetch())
    {
      echo $row["id_produto"];
    }
}


?>
