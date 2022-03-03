<?php
error_reporting(0);

if($_SESSION["LOGADO"] == true)
{
    header("Location: index.php");
}
$titulo = "Maos na massa - Registar";
require_once 'funcoes/navbar.php';
?>
    <div class="container w-50" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row g-5">
            <div class="col-12">
                <form class="needs-validation mt-3" action="./funcoes/criarConta.php" method="post" novalidate="">
                    <?php 
                    if (isset($_GET['err'])) { 
                    ?>
                    <div class="alert alert-danger text-center"><?php echo "Já existe uma conta com os mesmos dados!";?>
                    </div>
                    <?php
                    } 
                    ?>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nome</label>
                            <input name="nome" type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Sobrenome</label>
                            <input name="sobrenome" type="text" class="form-control" id="lastName" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="exemplo@gmail.com" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control
                                placeholder="............" required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Telefone</label>
                            <input name="telefone" type="phone" class="form-control" id="phone" placeholder="961442777"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Morada</label>
                            <input name="morada" type="text" class="form-control" id="address"
                                placeholder="Viseu Rua S.Estevão 3500-090" required>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="container text-center">
                        <button class="w-100 btn btn-lg btn-danger" type="submit">Criar conta</button>
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