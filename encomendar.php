<?php

error_reporting(0);

$titulo = "Maos na massa - Encomendar";
require_once 'funcoes/navbar.php';

if ($_SESSION["ENCOMENDA_ATIVA"] == true) {
    header("Location: checkout");
}

?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/b.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Encomendar</h2>
        <p class="fw-light text-white fs-2">Idealize o seu bolo</p>
    </div>
    <div class="container">
        <form method="post" action="./funcoes/validarEncomenda.php">
            <fieldset>
                <h2>Vamos começar!</h2>
                <p>Preencha os campos abaixo..</p>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <p>Tipo de bolo</p>
                            <select name="TIPO_BOLO" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Bolo de Aniversário</option>
                                <option value="2">Primeira comunhão</option>
                                <option value="3">Casamento</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Tipo de massa</p>
                            <select name="TIPO_MASSA" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Pão de ló</option>
                                <option value="2">Caramelo</option>
                                <option value="3">Cenoura</option>
                                <option value="4">Chocolate</option>
                                <option value="5">Iogurte</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Tipo de recheio</p>
                            <select name="TIPO_RECHEIO" class="col-sm-3 mb-3 text-black form-select">
                                <option value="1">Brigadeiro</option>
                                <option value="2">Doce d'ovo</option>
                                <option value="3">Brigadeiro de caramelo</option>
                                <option value="4">Creme russo</option>
                                <option value="5">Frutos vermelhos</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Informações</p>
                        <textarea name="DETALHES" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Escreva aqui informação sobre o peso e a decoração. Preencha com o maior detalhe possível!"></textarea>
                        <?php
                        if (isset($_GET['err'])) {
                        ?>
                            <div class="alert alert-danger text-center"><?php echo "Preencha os detalhes!"; ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn mt-2 btn-danger">Enviar</button>
            </fieldset>
        </form>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>
