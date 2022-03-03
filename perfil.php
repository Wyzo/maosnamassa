<?php
error_reporting(0);
$titulo = "Maos na massa - Perfil";
require_once 'funcoes/navbar.php';

if ($_SESSION["LOGADO"] == "false") {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sobrenome = $_POST["sobrenome"];

    if ($email != null and $nome != null and $sobrenome != null) {
        $emailV = $_SESSION["email"];
        $sql = "SELECT * FROM utilizadores WHERE email='$emailV'";

        $result = $link->query($sql);
        $row = $result->fetch();
        $id = $row["id"];

        unset($sql);
        $sql = "UPDATE utilizadores SET email = '$email', nome = '$nome', sobrenome = '$sobrenome' WHERE id = '$id'";
        if ($link->exec($sql)) {
            header("Location: perfil.php?suc=true");
            $_SESSION["email"] = $email;
        } else {
            header("Location: perfil.php?err=true");
        }
    } else {
        header("Location: perfil.php?err=true");
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
                        <a href="perfil.php" class="list-group-item list-group-item-action bg-danger text-white" aria-current="true">
                            Informações
                        </a>
                        <a href="perfilEncomendas.php" class="list-group-item list-group-item-action">Encomendas</a>
                        <a href="perfilMoradas.php" class="list-group-item list-group-item-action">Moradas</a>
                    </div>
                    <p class="text-start">Precisas de ajuda? Clica <a href="../ajuda.php" class="text-danger">aqui</a>
                        para acederes à área de suporte ao cliente!</p>
                </div>
            </div>
            <div class="col">
                <div class="container my-2 mb-2">

                    <h2 class="fs-3 fw-bold">A minha conta</h2>
                    <?php

                    require_once 'funcoes/db.php';

                    $email = $_SESSION["email"];
                    $sql = "SELECT * FROM Utilizadores WHERE email = '$email'";

                    $result = $link->query($sql);
                    $row = $result->fetch();

                    $img_name = $row["profile_pic_img"];

                    //echo $row["profile_pic_img"];
                    echo '<img src="imagens/profilepics/'. $img_name .'" alt="" style="width: 200px; height: 200px; background-size: cover;">';
                    //echo "<img src='imagens/profilepics/teste.jpg' width='150px' alt=''>";
                    ?>
                    <?php
                        if (isset($_GET['err'])) {
                        ?>
                            <div class="alert alert-danger text-center"><?php echo "Erro ao carregar imagem!"; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <p>Atualizar imagem de perfil</p>
                        <form action="./funcoes/uploadimgsperfil.php" method="post" enctype="multipart/form-data">
                            Selecione uma imagem:
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="width: 600px;" required>
                            <input style="width: 150px;" class="form-control my-1" type="submit" value="Carregar imagem" name="submit">
                        </form>
                    <hr style="height: 6px; background-color: red; width: 80px; opacity: 100%;">
                    <h1 class="fs-3 fw-light">INFORMAÇÕES DE CONTACTO</h1>
                    <p>Nome:
                        <?php
                        require_once 'funcoes/db.php';

                        $email = $_SESSION["email"];

                        $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

                        $result = $link->query($sql);
                        $row = $result->fetch();

                        echo $row["nome"];
                        ?>
                    </p>
                    <p>Sobrenome:
                        <?php
                        require_once 'funcoes/db.php';

                        $email = $_SESSION["email"];

                        $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

                        $result = $link->query($sql);
                        $row = $result->fetch();

                        echo $row["sobrenome"];
                        ?>
                    </p>
                    <p>E-mail:
                        <?php
                        error_reporting(0);

                        echo $_SESSION["email"];
                        ?>
                    </p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                        Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editar dados</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label for="floatingInput">Email</label>
                        <input name="email" type="email" required class="form-control" id="floatingInput" placeholder="maosnamassa@gmail.com">
                        <label for="floatingInput">Nome</label>
                        <input name="nome" type="text" required class="form-control" id="floatingInput" placeholder="nome">
                        <label for="floatingInput">Sobrenome</label>
                        <input name="sobrenome" type="text" required class="form-control" id="floatingInput" placeholder="sobrenome">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>