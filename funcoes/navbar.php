<?php
session_start();
error_reporting(0);
require_once './funcoes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = $_POST["idProduto"];
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
    unset($sql);
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/Logotipo.png">
    <script src="./css/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title><?php echo $titulo ?></title>
</head>
<style>
/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #ffffff;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #c92b4d;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow" style="font-size: 13px;">
        <div class="container">
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link text-white">@ Sobre a Mãos na Massa</a></li>
                    <li class="nav-item active"><a href="ajuda" class="nav-link text-white">Ajuda</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg py-3 navbar-dark shadow align-middle"
        style="background-image: url('./imagens/aleatorias/teste.png'); background-size: cover;">
        <div class="container">
            <a href="index" class="navbar-brand">
                <img src="./imagens/aleatorias/logotipo.png" width="45" alt="" class="d-inline-block align-middle mr-2"
                    style="width: 100px;">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto align-middle">
                    <li class="nav-item"><a href="galeria" class="nav-link text-danger">Galeria</a></li>
                    <li class="nav-item"><a href="pastelaria" class="nav-link text-danger">Pastelaria</a></li>
                    <?php
                    error_reporting(0);

                    if ($_SESSION["LOGADO"] == "true") {
                        echo '<li class="nav-item"><a href="encomendar" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if ($_SESSION["TIPO_CONTA"] == "admin") {
                            echo '<li class="nav-item"><a href="dashboard" class="nav-link text-danger">Dashboard</a></li>';
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>';
                            }
                        } else {
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>';
                            }
                        }
                    } else {
                        echo '<li class="nav-item"><a href="login" class="nav-link text-danger">Entrar/Registrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="a text-end">
                <?php
                $email = $_SESSION["email"];
                #Obter id do utilizador

                if ($_SESSION["LOGADO"] == "true") {
                    $sql = "SELECT * FROM Utilizadores WHERE email = '$email'";

                $result = $link->query($sql);
                $row = $result->fetch();
                $idUti = $row["id"];
                $img_name = $row["profile_pic_img"];
                $nome  = $row["nome"];
                #Obter o id do carrinho
                $sql = "SELECT * FROM carrinho WHERE id_utilizador = $idUti";
                $result = $link->query($sql);
                $row = $result->fetch();

                $id = $row["id"];

                $sql = "SELECT COUNT(*) AS quantia FROM carrinho_compras WHERE id_carrinho = $id";
                $result = $link->query($sql);
                $row = $result->fetch();

                $quantia = $row["quantia"];

                    echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto align-middle">
                    <li class="nav-item align-end"><a href="perfil" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                    <img src="imagens/profilepics/' . $img_name . '" alt="mdo" width="32" height="32" class="rounded-circle">
                    <li class="nav-item mx-2"><td><button type="button" class="btn text-white shadow position-relative" data-bs-toggle="modal" data-bs-target="#carrinho" style="background-color: #ff0033"><i class="fas fa-shopping-cart"></i> Carrinho<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'. $quantia . '</span></button></li>
                    <li class="nav-item"><a href="./funcoes/logout" class="nav-link text-danger">Sair</a></li>
                    </ul>';
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="modal" id="carrinho">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Carrinho de compras</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>id produto</th>
                                    <th>nome</th>
                                    <th>preco</th>
                                    <th>data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                session_start();
                                require_once 'funcoes/db.php';
                                error_reporting(1);

                               if (isset($_SESSION["email"])) {
                                $email = $_SESSION["email"];

                                $sql = "SELECT * FROM utilizadores WHERE email = '$email'";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $id = $row["id"];


                                $sql = "SELECT * FROM carrinho WHERE id_utilizador = $id";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $idcarrinho = $row["id"];

                                $sql = "SELECT * FROM carrinho_compras WHERE id_carrinho = $idcarrinho";
                                $result = $link->query($sql);
                                $totalPagar;

                                if ($result->rowCount() > 0) {
                                    foreach ($link->query($sql) as $row2) {
                                        $imgNome = $row2["img_nome"];
                                        $idproduto = $row2["id_produto"];
                                        $idteste = $row2["id"];

                                        $sql = "SELECT * FROM produtos WHERE id = $idproduto";
                                        $result = $link->query($sql);
                                        $row = $result->fetch();
                                        $totalPagar += $row["preco"];

                                        echo "<tr>";
                                        echo "<td>" . $idteste . "</td>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["nome"] . "</td>";
                                        echo "<td>" . $row["preco"] . "€</td>";
                                        echo "<td>" . $row2["data"] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='./funcoes/remover?id=". $idteste ."'>Remover</a></td>";
                                        echo "</tr>";
                                    }
                                    //echo "<p>Total a pagar: " . $totalPagar . "€</p>";
                                }
                                echo "<p>Total a pagar: " . $totalPagar . "€</p>";
                               }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><a href="checkout" class="text-white text-decoration-none">Checkout</a></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>