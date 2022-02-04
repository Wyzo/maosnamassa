<?php

$titulo = "Maos na massa - Sucesso";
require_once 'funcoes/navbar.php';
require_once 'funcoes/carrinho.php';
require_once 'css/submit.css';

error_reporting(0);


if ($_SESSION["ENCOMENDA_ATIVA"] == true and $_SESSION["PAGO"] == false) {
    header("Location: checkout.php");
}
if ($_SESSION["ENCOMENDA_ATIVA"] == false and $_SESSION["PAGO"] == false) {
    header("Location: index.php");
}


$_SESSION["ENCOMENDA_ATIVA"] = false;
$_SESSION["PAGO"] = false;
?>
    <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
    </div>
    <div class="container text-center" style="margin-bottom: 100px;">
        <h2 class="fs-1">Sucesso!</h2>
        <p class="fw-light fs-3">A sua encomenda foi registada com sucesso e foi-lhe atribuida o número:</p>
        <div id="numero" class="fw-bold" style="color: #7ac142; font-size: 40px;">
            <script>
                document.getElementById("numero").innerHTML = "#" + Math.floor(Math.random() * (999999 - 111111 + 1) +
                    111111);
            </script>
        </div>
        <div class="container text-center">
            <a href="index.php" class="bg-danger text-white text-decoration-none p-2" style="border-radius: 5px;">Voltar</a>
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