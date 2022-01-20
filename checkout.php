<?php

session_start();

if ($_SESSION["ENCOMENDA_ATIVA"] == false) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/aleatorias/Logotipo.png">
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title>Mãos na Massa - Checkout</title>
</head>

<style>
    #paypala,
    #mbwaya {
        visibility: hidden;
    }
</style>

<script>
    function validarNumero(event) {
        var char = String.fromCharCode(event.which);

        if (!(/[0-9]/.test(char))) {
            event.preventDefault();
        }
    }
</script>

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
    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-light shadow align-middle">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="./imagens/aleatorias/logotipo.png" width="45" alt="" class="d-inline-block align-middle mr-2" style="width: 100px;">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto align-middle">
                    <li class="nav-item"><a href="galeria.php" class="nav-link text-danger">Galeria</a></li>
                    <?php
                    error_reporting(0);

                    if ($_SESSION["LOGADO"] == "true") {
                        echo '<li class="nav-item"><a href="encomendar.php" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if ($_SESSION["TIPO_CONTA"] == "admin") {
                            echo '<li class="nav-item"><a href="dashboard.php" class="nav-link text-danger">dashboard</a></li>';
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img src="./imagens/profilepics/admin.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                              </body>';
                            }
                        } else {
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img href="perfil.php" src="./imagens/profilepics/utilizador.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                                </body>';
                            }
                        }
                        echo '<li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link text-danger">Entrar/Registrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/b.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Encomendar</h2>
        <p class="fw-light text-white fs-2">Idealize o seu bolo</p>
    </div>

    <div class="container text-center">
        <i class="fas fa-birthday-cake fa-6x" style="color:rgb(255, 0, 98)"></i>
        <h2>UUUHH!</h2>
        <p class="fs-4">Falta pouco..</p>
        <p class="fw-light">Preencha os campos abaixo para terminar a sua encomenda!</p>
    </div>
    <div class="a" style="background-color: #fcfcfc;">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span>Detalhes do seu pedido!</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Tipo de bolo</h6>
                                <small class="text-muted" id="tipo_bolo">
                                    <?php
                                    session_start();

                                    $idBolo = $_SESSION["tipoBOLO"];
                                    switch ($idBolo) {
                                        case 1:
                                            echo '<p>Bolo de Aniversário</p>';
                                            break;
                                        case 2:
                                            echo '<p>Bolo de Primeira comunhão</p>';
                                            break;
                                        case 3:
                                            echo '<p>Bolo de Casamento</p>';
                                    }
                                    ?>
                                </small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Tipo de massa</h6>
                                <small class="text-muted" id="tipo_massa">
                                    <?php
                                    session_start();

                                    $idBolo = $_SESSION["tipoMASSA"];
                                    switch ($idBolo) {
                                        case 1:
                                            echo '<p>Pão de ló</p>';
                                            break;
                                        case 2:
                                            echo '<p>Caramelo</p>';
                                            break;
                                        case 3:
                                            echo '<p>Cenoura</p>';
                                        case 4:
                                            echo '<p>Chocolate</p>';
                                        case 5:
                                            echo '<p>Iogurte</p>';
                                    }
                                    ?>
                                </small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Tipo de recheio</h6>
                                <small class="text-muted" id="tipo_recheio">
                                    <?php
                                    session_start();

                                    $idBolo = $_SESSION["tipoRECHEIO"];
                                    switch ($idBolo) {
                                        case 1:
                                            echo '<p>Brigadeiro</p>';
                                            break;
                                        case 2:
                                            echo '<p>Doce d ovo</p>';
                                            break;
                                        case 3:
                                            echo '<p>Brigadeiro de caramelo</p>';
                                        case 4:
                                            echo '<p>Creme russo</p>';
                                        case 5:
                                            echo '<p>Frutos vermelhos</p>';
                                    }
                                    ?>
                                </small>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Detalhes</h6>
                                <small class="text-muted" id="tipo_recheio">
                                    <?php
                                    session_start();
                                    echo '<div>' . $_SESSION["DETALHES"] . '<div/>';
                                    ?>
                                </small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>35€</strong>
                        </li>
                    </ul>
                    <form class="card p-2" method="post" action="./funcoes/cancelarEncomenda.php">
                        <div class="input-group">
                            <button type="submit" class="btn btn-secondary">Cancelar encomenda</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Informações de envio</h4>
                    <div class="row gy-3 mb-5" id="cartaoCredito">
                        <form action="./funcoes/validarCheckout.php?metodo=cartao" method="post">
                            <?php

                            if($_GET['err'] == 1)
                            {
                                echo '<div class="alert alert-danger text-center"><?php echo "Imagem já existe"; ?>
                                </div>';
                            }
                            else if($_GET['err'] == 2)
                            {
                                echo '<div class="alert alert-danger text-center"><?php echo "Imagem muito grande"; ?>
                                </div>';
                            }
                            else if($_GET['err'] == 3)
                            {
                                echo '<div class="alert alert-danger text-center"><?php echo "Ficheiro não suportado"; ?>
                                </div>';
                            }

                            if (isset($_GET['err'])) {
                            ?>
                                <div class="alert alert-danger text-center"><?php echo "Erro ao confirmar pagamento"; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="row g-3">
                                <div class="col-sm-6">

                                    <div class="col-12">
                                        <label for="Telemovel" class="form-label">Telefone</label>
                                        <input type="phone" name="telefone" class="form-control" id="telefone" placeholder="961442999" onkeypress="validarNumero(event);" maxlength="9" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="morada" class="form-label">Morada</label>
                                        <input type="text" class="form-control" id="morada" placeholder="Rua da tamancaria pascoal" required="" required>
                                        <div class="invalid-feedback">
                                            Por-favor utilize uma morada valida.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Codigo Postal</label>
                                        <input type="text" name="codigoPostal" class="form-control" id="address2" placeholder="3515-079" required>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <h4 class="mb-3">Modo de pagamento</h4>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Nome do cartão</label>
                                <input name="nomeCartao" type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Nome completo conforme exibido no cartão</small>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Número do cartão</label>
                                <input name="numCartao" type="text" class="form-control" id="cc-number" placeholder="" onkeypress="validarNumero(event);" maxlength="16" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiração</label>
                                <input name="dataCartao" type="date" class="form-control" id="cc-expiration" placeholder="teste" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input name="codigoSeguranca" type="text" class="form-control" id="cc-cvv" placeholder="" onkeypress="validarNumero(event);" maxlength="3" required>
                            </div>
                            <button type="submit" class="btn btn-success">Pagar</button>
                        </form>
                    </div>
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
</body>

</html>