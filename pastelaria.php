<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/Logotipo.png">
    <title>Mãos na massa - Pastelaria</title>
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
                if ($_SESSION["LOGADO"] == "true") {
                    echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                    <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                    <img src="./imagens/profilepics/admin.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                    <li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>
                    </ul>';
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/background.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Pastelaria</h2>
        <p class="fw-light text-white fs-2">Produtos</p>
    </div>

    <div class="produtos">
        <div class="container p-5">
            <?php
            


            ?>
            <div class="container text-center">
                <h2>Os destaques da semana</h2>
            </div>
            <div class="row">
                <div class="col text-center p-2">
                    <img src="imagens/pastelaria/pao.jpg" width="150px" alt="">
                    <h1 class="fw-bold fs-5">Bola Rústica 90g</h1>
                    <p>5,00€</p>
                    <p>0,25€/unidade</p>
                    <p>pacote 20 un</p>
                    <button class="btn btn-danger text-white fw-bold">Detalhes</button>
                </div>
                <div class="col text-center p-2">
                    <img src="imagens/pastelaria/folhado.jpg" width="150px" alt="">
                    <h1 class="fw-bold fs-5">Folhado de Frango</h1>
                    <p>5,76€</p>
                    <p>0,96€/unidade</p>
                    <p>pacote 6 un</p>
                    <button class="btn btn-danger text-white fw-bold">Detalhes</button>
                </div>
                <div class="col text-center p-2">
                    <img src="imagens/pastelaria/folhadomisto.jpg" width="150px" alt="">
                    <h1 class="fw-bold fs-5">Folhado Misto</h1>
                    <p>14,40€</p>
                    <p>0,90€/unidade</p>
                    <p>pacote 16 un</p>
                    <button class="btn btn-danger text-white fw-bold">Detalhes</button>
                </div>
                <div class="col text-center p-2">
                    <img src="imagens/pastelaria/croissant.jpg" width="150px" alt="">
                    <h1 class="fw-bold fs-5">Croissant Chocolate</h1>
                    <p>18,40€</p>
                    <p>0,80€/unidade</p>
                    <p>pacote 23 un</p>
                    <button class="btn btn-danger text-white fw-bold">Detalhes</button>
                </div>
                <div class="col text-center p-2">
                    <img src="imagens/pastelaria/pastelnata.jpg" width="150px" alt="">
                    <h1 class="fw-bold fs-5">Pastel de Nata</h1>
                    <p>4,19€</p>
                    <p>0,70€/unidade</p>
                    <p>pacote 6 un</p>
                    <button class="btn btn-danger text-white fw-bold">Detalhes</button>
                </div>
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