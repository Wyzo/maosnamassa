<?php

session_start();

if($_SESSION["ENCOMENDA_ATIVA"] == false)
{
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
function mudarPagamento(x) {
    if (x == 0) {
        document.getElementById('cartaoCredito').style.visibility = "visible";
        document.getElementById('paypala').style.visibility = "hidden";
        document.getElementById('mbwaya').style.visibility = "hidden";
    } else if (x == 1) {
        document.getElementById('cartaoCredito').style.visibility = "hidden";
        document.getElementById('paypala').style.visibility = "visible";
        document.getElementById('mbwaya').style.visibility = "hidden";
    } else {
        document.getElementById('cartaoCredito').style.visibility = "hidden";
        document.getElementById('paypala').style.visibility = "hidden";
        document.getElementById('mbwaya').style.visibility = "visible";
    }
    return;
}
</script>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow" style="font-size: 13px;">
        <div class="container">
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

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
                <img src="./imagens/aleatorias/logotipo.png" width="45" alt="" class="d-inline-block align-middle mr-2"
                    style="width: 100px;">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto align-middle">
                    <li class="nav-item"><a href="galeria.php" class="nav-link text-danger">Galeria</a></li>
                    <?php
                    error_reporting(0);
        
                    if($_SESSION["LOGADO"] == "true")
                    {
                        echo '<li class="nav-item"><a href="encomendar.php" class="nav-link text-danger mr-5">Encomendar</a></li>';
                        if($_SESSION["TIPO_CONTA"] == "admin")
                        {
                            echo '<li class="nav-item"><a href="dashboard.php" class="nav-link text-danger">dashboard</a></li>';
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="#" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img src="./imagens/profilepics/admin.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                              echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                              </body>';
                            }
                        }
                        else
                        {
                            echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center flex-nowrap ms-auto">
                            <li class="nav-item align-end"><a href="#" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                            <img src="./imagens/profilepics/utilizador.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                            </ul>';
                            if($_SESSION["ENCOMENDA_ATIVA"] == true)
                            {
                                echo '<li class="nav-item mx-2"><a href="checkout.php" class="nav-link text-white fw-bold bg-danger" style="border-radius: 15px;"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                                </body>';
                            }
                        }
                        echo '<li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>';
                    }
                    else
                    {
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
                    switch($idBolo)
                    {
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
                    switch($idBolo)
                    {
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
                    switch($idBolo)
                    {
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
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <div class="col-12">
                                    <label for="Telemovel" class="form-label">Telefone</label>
                                    <input type="phone" class="form-control" id="telefone" placeholder="961442999">
                                    <div class="invalid-feedback">
                                        Por-favor utilize um número de telefone valido.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="morada" class="form-label">Morada</label>
                                    <input type="text" class="form-control" id="morada"
                                        placeholder="Rua da tamancaria pascoal" required="">
                                    <div class="invalid-feedback">
                                        Por-favor utilize uma morada valida.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address2" class="form-label">Codigo Postal</label>
                                    <input type="text" class="form-control" id="address2" placeholder="3515-079">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="same-address">
                                <label class="form-check-label" for="same-address">O endereço de entrega é o
                                    mesmo</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="save-info">
                                <label class="form-check-label" for="save-info">salvar informação</label>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Modo de pagamento</h4>
                            <?php 
                        if (isset($_GET['err'])) { 
                        ?>
                            <div class="alert alert-danger text-center"><?php echo "Erro ao confirmar pagamento";?>
                            </div>
                            <?php
                        } 
                        ?>
                            <div class="my-3">

                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        checked="" required="" onclick="mudarPagamento(0)">
                                    <label class="form-check-label" for="credit">Cartão de credito</label>
                                </div>

                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                        required="" onclick="mudarPagamento(1)">
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                </div>

                                <div class="form-check">
                                    <input id="mbway" name="paymentMethod" type="radio" class="form-check-input"
                                        required="" onclick="mudarPagamento(2)">
                                    <label class="form-check-label" for="mbway">MB Way</label>
                                </div>

                            </div>

                            <div class="row gy-3" id="cartaoCredito">
                                <form action="./funcoes/validarCheckout.php?metodo=cartao" method="post">
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Nome do cartão</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                        <small class="text-muted">Nome completo conforme exibido no cartão</small>
                                        <div class="invalid-feedback">
                                            Nome do cartão inválido
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">Número do cartão</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder=""
                                            required="">
                                        <div class="invalid-feedback">
                                            Número do cartão inválido
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label">Expiração</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                            required="">
                                        <div class="invalid-feedback">
                                            Expiração inválida
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Codigo de segurança inválido
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#mbwaymodal">
                                        Pagar
                                    </button>
                                </form>
                            </div>

                            <div class="row" id="paypala">
                                <h2>Paypal</h2>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#paypalModal" style="width: 200px; color: blue; font-weight: bold;">
                                    <img src="./imagens/aleatorias/PayPal-Logo.png" width="70px" alt="">
                                </button>
                            </div>

                            <div class="container" id="mbwaya">
                                <p class="fs-5">Número de telemóvel</p>
                                <p class="fw-light">Após enviar, confirme na sua aplicação MB Way</p>
                                <input class="form-control" style="width: 200px;" type="number"
                                    placeholder="+351 111111111">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#mbwayModal">
                                    Enviar código
                                </button>
                            </div>

                            <hr class="my-2">
                            <button class="w-50 btn btn-danger btn-lg mb-4" type="submit" style="width: 130px;">Continue
                                o
                                checkout</button>
                        </div>
                    </form>
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
                            <li class="nav-item mb-2"><a href="encomendar.php"
                                    class="nav-link p-0 text-white">Encomendar</a>
                            </li>
                            <li class="nav-item mb-2"><a href="ajuda.php" class="nav-link p-0 text-white">Ajuda</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Apoio ao cliente</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">(+351 961442777))</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-white">coisascombolo@gmail.com</a></li>
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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.341241639568!2d-7.933954784341394!3d40.68848164699045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2348272b934bd5%3A0xa9ac82cb7b392147!2sLargo%20Rossio%2C%20Viseu!5e0!3m2!1spt-PT!2spt!4v1641941380433!5m2!1spt-PT!2spt"
                            width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="paypalModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Esperando confirmar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="paypalModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <img src="./imagens/aleatorias/PayPal-Logo.png" width="70px" alt="">
                        <strong>Confirmando...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="./funcoes/validarCheckout.php?metodo=paypal" method="post">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="paypalModal">Confirmar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="paypalModal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mbwayModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Esperando confirmar código</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <img src="./imagens/aleatorias/unnamed.png" width="70px" alt="">
                        <strong>Confirmando...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="./funcoes/validarCheckout.php?metodo=mbway" method="post">
                        <textarea name="CODIGO" class="form-control" id="exampleFormControlTextarea1" rows="4"
                            placeholder="Código"></textarea>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <a href="encomendavalida.php">teste</a>
</body>

</html>