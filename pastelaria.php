<?php
$titulo = "Maos na massa - Pastelaria";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';

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
                        echo "<h1 class='fs-4'>$nome</h1>";
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
    <div class="a" style="background-color: #910037; color: #FFFFFF">
        <div class="container">
            <footer class="py-5">
                <div class="row">

                    <div class="col-2">
                        <h5>Acesso Rápido</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="galeria.php" class="nav-link p-0 text-white">Galeria</a>
                            </li>
                            <li class="nav-item mb-2"><a href="encomendar.php" class="nav-link p-0 text-white">Encomendar</a>
                            </li>
                            <li class="nav-item mb-2"><a href="ajuda.php" class="nav-link p-0 text-white">Ajuda</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Apoio ao cliente</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">(+351 961442777))</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">coisascombolo@gmail.com</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Messenger</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Quem somos</h5>
                        <ul class="nav flex-column">
                            <p>Somos uma empresa de confeitaria tradicional portuguesa, de cake disign.</p>
                        </ul>
                    </div>
                    <div class="col-4 offset-1">
                        <h2>Venha nos visitar!</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.341241639568!2d-7.933954784341394!3d40.68848164699045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2348272b934bd5%3A0xa9ac82cb7b392147!2sLargo%20Rossio%2C%20Viseu!5e0!3m2!1spt-PT!2spt!4v1641941380433!5m2!1spt-PT!2spt" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>

</html>