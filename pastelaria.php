<?php
$titulo = "Maos na massa - Pastelaria";
require_once 'funcoes/navbar.php';

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

    $sql = "INSERT INTO carrinho_compras(id_carrinho, id_produto) VALUES($id_carrinho, $produto)";
    $result = $link->exec($sql);

    unset($sql);
    Header('Location: '.$_SERVER['PHP_SELF']);
}

?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/background.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Pastelaria</h2>
        <p class="fw-light text-white fs-2">Produtos</p>
    </div>

    <div class="produtos">
        <div class="container p-5">
            <div class="container text-center">
                <h2>Os destaques da semana</h2>
                <h1 class="fs-5 fw-light">
                <?php
                
                $sql = "SELECT COUNT(*) AS numProdutos FROM produtos";
                $result = $link->query($sql);
                $row = $result->fetch();

                $quantia = $row["numProdutos"];

                echo $quantia . " novos deliciosos produtos!";
                
                ?>
                </h1>
            </div>
            <div class="row">
                <?php

                require_once './funcoes/db.php';

                $sql = "SELECT * FROM produtos";
                $result = $link->query($sql);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch()) {
                        $imgNome = $row["img_nome"];
                        $preco = $row["preco"];
                        $nome = $row["nome"];
                        echo '<div class="col text-center p-2">';
                        echo "<img src='imagens/pastelaria/$imgNome' alt='' style='width: 180px'>";
                        echo "<h1 class='fs-5'>$nome</h1>";
                        echo "<p class='fs-4'>$preco €</p>";
                        echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
                        echo "<button class='w-100 btn btn-lg btn-danger' type='submit'>Adicionar";
                        echo "<input type='hidden' name='idProduto' value=" . $row["id"] . ">";
                        echo "</button>";
                        echo "</form>";
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>

</html>