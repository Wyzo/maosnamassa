<?php

$titulo = "Maos na massa - Sucesso";
require_once 'funcoes/navbar.php';
require_once 'css/submit.css';

error_reporting(0);


if ($_SESSION["ENCOMENDA_ATIVA"] == true and $_SESSION["PAGO"] == false) {
    header("Location: checkout");
}
if ($_SESSION["ENCOMENDA_ATIVA"] == false and $_SESSION["PAGO"] == false) {
    header("Location: index");
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
            <a href="index" class="bg-danger text-white text-decoration-none p-2" style="border-radius: 5px;">Voltar</a>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>