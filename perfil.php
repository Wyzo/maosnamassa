<?php

session_start();

error_reporting(0);

require_once 'funcoes/db.php';

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
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" href="./imagens/aleatorias/logotipo.png">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>Mãos na Massa - Perfil</title>
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
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link text-white">@ Sobre a Mãos na Massa</a></li>
                    <li class="nav-item active"><a href="ajuda.php" class="nav-link text-white">Ajuda</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg py-3 navbar-dark shadow align-middle" style="background-image: url('./imagens/aleatorias/teste.png'); background-size: cover;">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="./imagens/aleatorias/logotipo.png" width="45" alt="" class="d-inline-block align-middle mr-2" style="width: 100px;">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto align-middle">
                    <li class="nav-item"><a href="galeria.php" class="nav-link text-danger">Galeria</a></li>
                    <li class="nav-item"><a href="pastelaria.php" class="nav-link text-danger">Pastelaria</a></li>
                    <?php
                    error_reporting(0);

                    if ($_SESSION["LOGADO"] == "true") {
                        echo '<li class="nav-item"><a href="encomendar.php" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if ($_SESSION["TIPO_CONTA"] == "admin") {
                            echo '<li class="nav-item"><a href="dashboard.php" class="nav-link text-danger">dashboard</a></li>';
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                              </body>';
                            }
                        } else {
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                                </body>';
                            }
                        }
                    } else {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link text-danger">Entrar/Registrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="containe text-end">
                <?php
                $email = $_SESSION["email"];
                $sql = "SELECT * FROM Utilizadores WHERE email = '$email'";

                $result = $link->query($sql);
                $row = $result->fetch();

                $img_name = $row["profile_pic_img"];
                if ($_SESSION["LOGADO"] == "true") {
                    echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                    <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                    <img src="imagens/profilepics/'. $img_name .'" alt="mdo" width="32" height="32" class="rounded-circle">
                    <li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>
                    </ul>';
                }
                ?>
            </div>
        </div>
    </nav>
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
</body>

</html>