<?php
$titulo = "Maos na massa - Ajuda";
require_once 'funcoes/navbar.php';
?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/aa.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Ajuda</h2>
        <p class="fw-light text-white fs-2">Área de suporte ao cliente</p>
    </div>

    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <form action="./funcoes/validarMensagem" method="post">
                        <?php 
                        if (isset($_GET['err'])) { 
                        ?>
                        <div class="alert alert-danger text-center"><?php echo "Dados inválidos!";?>
                        </div>
                        <?php
                        } 
                        ?>
                    <div class="mb-3">
                        <input type="email" name="EMAIL" class="form-control mb-3" id="exampleFormControlInput1"
                            placeholder="Email">
                        <div class="row">
                            <div class="col">
                                <input type="number" name="TELEFONE" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Telefone">
                            </div>
                            <div class="col">
                                <input class="form-control" name="NOME" id="exampleFormControlInput1"
                                    placeholder="Nome">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="COMENT" id="exampleFormControlTextarea1" rows="8"
                            placeholder="Escreva aqui o seu comentário"></textarea>
                    </div>
                    <a href="submit.php"><button href="" type="submit"
                            class="btn btn-danger btn-lg px-4 me-md-2">Enviar</button></a>

                </form>
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3 text-danger">Apoio ao cliente</h1>
                <p class="lead">A Panike irá entrar em contacto consigo para o ajudar a responder à sua dúvida ou
                    problema.
                    Por favor, valide os seus dados e indique a sua dúvida ou problema.</p>
                <h2>Dados para contacto</h2>
                <p class="text-danger">Morada: Pascoal, Viseu</p>
                <h2>Outros dados</h2>
                <p class="text-danger">Telefone: 967 142 612</p>
                <p class="text-danger">Email: maosnamassa@gmail.com</p>
            </div>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>

</html>