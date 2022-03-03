<?php
error_reporting(0);
$titulo = "Maos na massa - Moradas";
require_once 'funcoes/navbar.php';

if ($_SESSION["LOGADO"] == "false") {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST["morada_envio"])) {
        $morada_envio = $_POST["morada_envio"];

        $emailV = $_SESSION["email"];
        $sql = "SELECT * FROM utilizadores WHERE email='$emailV'";

        $result = $link->query($sql);
        $row = $result->fetch();
        $id = $row["id"];

        unset($sql);
        $sql = "UPDATE utilizadores SET morada_envio = '$morada_envio' WHERE id = '$id'";
        if ($link->exec($sql)) {
            header("Location: perfilMoradas.php?suc=true");
        } else {
            header("Location: perfilMoradas.php?err=true");
        }
    }else if (isset($_POST["morada_cobranca"])) {
        $morada_cobranca = $_POST["morada_cobranca"];

        $emailV = $_SESSION["email"];
        $sql = "SELECT * FROM utilizadores WHERE email='$emailV'";

        $result = $link->query($sql);
        $row = $result->fetch();
        $id = $row["id"];

        unset($sql);
        $sql = "UPDATE utilizadores SET morada_cobranca = '$morada_cobranca' WHERE id = '$id'";
        if ($link->exec($sql)) {
            header("Location: perfilMoradas.php?suc=true");
        } else {
            header("Location: perfilMoradas.php?err=true");
        }
    } else {
        header("Location: perfilMoradas.php?err=true");
    }
}

?>
    <?php
    if (isset($_GET['err'])) {
    ?>
    <div class="container p-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo "Erro ao atualizar dados"; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    if (isset($_GET['suc'])) {
    ?>
    <div class="container p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo "Dados atualizados com sucesso!"; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="container my-5 ">
        <div class="row">
            <div class="col-3 text-start">
                <div class="container">
                <?php
                    error_reporting(0);

                    if ($_SESSION["LOGADO"] == "true") {
                        echo '<a href="#" class="nav-link fw-light fs-6 text-black">' . $_SESSION["email"] . '</a>';
                        echo '<a class="text-black" href="./funcoes/logout.php">Logout</a>';
                    }
                    ?>
                    <div class="list-group text-start my-5">
                        <h2>Painel da conta</h2>
                        <a href="perfil.php" class="list-group-item list-group-item-action" aria-current="true">
                            Informações
                        </a>
                        <a href="perfilEncomendas.php" class="list-group-item list-group-item-action">Encomendas</a>
                        <a href="perfilMoradas.php" class="list-group-item list-group-item-action bg-danger text-white">Moradas</a>
                    </div>
                    <p class="text-start">Precisas de ajuda? Clica <a href="../ajuda.php" class="text-danger">aqui</a>
                        para acederes à área de suporte ao cliente!</p>
                </div>
            </div>
            <div class="col">
                <div class="container my-2 mb-2">
                    <h2 class="fs-3 fw-bold">A minha conta</h2>
                    <hr style="height: 6px; background-color: red; width: 80px; opacity: 100%;">
                    <h1 class="fs-3 fw-light">MORADA DE ENVIO</h1>
                    <p>
                        <?php

                        require_once 'funcoes/db.php';

                        $email = $_SESSION["email"];

                        $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

                        $result = $link->query($sql);
                        $row = $result->fetch();

                        echo $row["morada_envio"];
                        ?>
                    </p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEnvio">
                        Editar
                    </button>
                </div>
                <div class="modal" id="modalEnvio">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar dados</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="floatingInput">Nova morada de envio</label>
                                    <input name="morada_envio" type="text" required class="form-control" id="floatingInput" placeholder="Nova morada">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container p">
                    <h1 class="fs-3 fw-light">MORADA DE COBRANÇA POR DEFEITO</h1>
                    <p>
                        <?php
                        require_once 'funcoes/db.php';

                        $email = $_SESSION["email"];

                        $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

                        $result = $link->query($sql);
                        $row = $result->fetch();

                        echo $row["morada_cobranca"];
                        ?>
                    </p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCobranca">
                        Editar
                    </button>
                </div>
                <div class="modal" id="modalCobranca">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar dados</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="floatingInput">Nova morada de cobrança</label>
                                    <input name="morada_cobranca" type="text" required class="form-control" id="floatingInput" placeholder="Nova morada">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>