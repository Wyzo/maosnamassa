<?php

$titulo = "Maos na massa - Checkout";
require_once 'funcoes/navbar.php';

if ($_SESSION["ENCOMENDA_ATIVA"] == false) {
    header("Location: index");
}


function validarCampos($numCartao, $dataCartao, $codigoSeguranca, $codpostal, $telefone)
{
    $data_agora = date("Y-m-d");

    if (
        strlen(trim($codigoSeguranca)) != 3
        or strlen(trim($numCartao)) != 16
        or $dataCartao < $data_agora
        or strlen(trim($telefone)) != 9
        or preg_match('/^\d{4}(-\d{3})?$/', $codpostal) != 1
    ){
        return false;
    } else {
        return true;
    }
}

    function validaDadosCartao($codigoSeguranca, $numCartao, $dataCartao, $telefone, $codpostal)
    {
        $data_agora = date("Y-m-d");
        if (strlen(trim($codigoSeguranca)) != 3 or strlen(trim($numCartao)) != 16 or $dataCartao < $data_agora or strlen(trim($telefone)) != 9 or preg_match('/^\d{4}(-\d{3})?$/', $codpostal) != 1) {
            return false;
        } else {
            return true;
        }
    }

    function getTipoBolo($tipo_bolo)
    {
        switch ($tipo_bolo) {
            case 1:
                return "Bolo de aniversário";
                break;
            case 2:
                return "Primeira comunhão";
                break;
            case 3:
                return "Casamento";
                break;
        }
    }

    function getTipoMassa($tipo_massa)
    {
        switch ($tipo_massa) {
            case 1:
                return "Pão de ló";
                break;
            case 2:
                return "Caramelo";
                break;
            case 3:
                return "Cenoura";
                break;
            case 4:
                return "Chocolate";
                break;
            case 5:
                return "Iogurte";
                break;
        }
    }

    function getTipoRecheio($tipo_recheio)
    {
        switch ($tipo_recheio) {
            case 1:
                return "Brigadeiro";
                break;
            case 2:
                return "Doce d'ovo";
                break;
            case 3:
                return "Brigadeiro de caramelo";
                break;
            case 4:
                return "Creme russo";
                break;
            case 5:
                return "Frutos vermelhos";
                break;
        }
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomeCartao = $_POST["nomeCartao"];
    $numCartao = $_POST["numCartao"];
    $dataCartao = $_POST["dataCartao"];
    $codigoSeguranca = $_POST["codigoSeguranca"];
    $codpostal = $_POST["codigoPostal"];
    $data_agora = date("Y-m-d");
    $telefone = $_POST["telefone"];

    $tipo_bolo = $_SESSION["tipoBOLO"];
    $tipo_massa = $_SESSION["tipoMASSA"];
    $tipo_recheio = $_SESSION["tipoRECHEIO"];
    $detalhes = $_SESSION["DETALHES"];
    $email = $_SESSION["email"];

    if (validaDadosCartao($codigoSeguranca, $numCartao, $dataCartao, $telefone, $codpostal) == true) {
        $sql = "SELECT * FROM utilizadores WHERE email = '$email'";

        $result = $link->query($sql);
        $row = $result->fetch();

        $id = $row["id"];

        $tipobolo = getTipoBolo($tipo_bolo);
        $tipomassa = getTipoMassa($tipo_massa);
        $tiporecheio = getTipoRecheio($tipo_recheio);

        $sql = "INSERT INTO encomendas (detalhes, id_cliente, morada_envio, preco, tipo_bolo, tipo_massa, tipo_recheio)
        VALUES('$detalhes', '$id', '$morada', '35', '$tipobolo', '$tipomassa', '$tiporecheio')";

        if ($link->exec($sql)) {
            unset($_SESSION["PAGO"]);
            $_SESSION["PAGO"] = true;
            unset($_SESSION["ENCOMENDA_ATIVA"]);
            $_SESSION["ENCOMENDA_ATIVA"] = false;
            header('location: encomendavalida');
        }
    } else {
        header('location: checkout?err=true');
    }
}

?>
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
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nome</th>
                                    <th>preco</th>
                                    <th>data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                session_start();
                                require_once 'funcoes/db.php';
                                error_reporting(1);

                               if (isset($_SESSION["email"])) {
                                $email = $_SESSION["email"];

                                $sql = "SELECT * FROM utilizadores WHERE email = '$email'";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $id = $row["id"];


                                $sql = "SELECT * FROM carrinho WHERE id_utilizador = $id";
                                $result = $link->query($sql);
                                $row = $result->fetch();
                                $idcarrinho = $row["id"];

                                $sql = "SELECT * FROM carrinho_compras WHERE id_carrinho = $idcarrinho";
                                $result = $link->query($sql);
                                $totalapagar;

                                if ($result->rowCount() > 0) {
                                    foreach ($link->query($sql) as $row2) {
                                        $imgNome = $row2["img_nome"];
                                        $idproduto = $row2["id_produto"];

                                        $sql = "SELECT * FROM produtos WHERE id = $idproduto";
                                        $result = $link->query($sql);
                                        $row = $result->fetch();
                                        $totalapagar += $row["preco"];

                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["nome"] . "</td>";
                                        echo "<td>" . $row["preco"] . "€</td>";
                                        echo "<td>" . $row2["data"] . "</td>";
                                        echo "<td><a class='btn btn-danger' href='./funcoes/remover?id=". $row['id'] ."'>Remover</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                echo "<p>Total a pagar:<bold> " . $totalapagar . "€</bold></p>";
                               }
                                ?>
                            </tbody>
                        </table>
                    <form class="card p-2" method="post" action="./funcoes/cancelarEncomenda">
                        <div class="input-group">
                            <button type="submit" class="btn btn-secondary">Cancelar encomenda</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Informações de envio</h4>
                    <div class="row gy-3 mb-5" id="cartaoCredito">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <?php
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
                                        <input type="phone" name="telefone" class="form-control" id="telefone" placeholder="961442999" onkeypress="validarNumero(event);" maxlength="9" value="<?php echo $_POST["telefone"]; ?>" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="morada" class="form-label">Morada</label>
                                        <input type="text" class="form-control" name="morada" id="morada" placeholder="Rua da tamancaria pascoal" value="<?php echo $_POST["morada"]; ?>" required>
                                        <div class="invalid-feedback">
                                            Por-favor utilize uma morada valida.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Codigo Postal</label>
                                        <input type="text" name="codigoPostal" class="form-control" id="address2" placeholder="3515-079" value="<?php echo $_POST["codigoPostal"]; ?>" required>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <h4 class="mb-3">Modo de pagamento</h4>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Nome do cartão</label>
                                <input name="nomeCartao" type="text" class="form-control" id="cc-name" placeholder="" value="<?php echo $_POST["nomeCartao"]; ?>" required>
                                <small class="text-muted">Nome completo conforme exibido no cartão</small>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Número do cartão</label>
                                <input name="numCartao" type="text" class="form-control" id="cc-number" placeholder="" onkeypress="validarNumero(event);" maxlength="16" value="<?php echo $_POST["numCartao"]; ?>" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiração</label>
                                <input name="dataCartao" type="date" class="form-control" id="cc-expiration" placeholder="teste" value="<?php echo $_POST["dataCartao"]; ?>" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input name="codigoSeguranca" type="text" class="form-control" id="cc-cvv" placeholder="" onkeypress="validarNumero(event);" maxlength="3" value="<?php echo $_POST["codigoSeguranca"]; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success">Pagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
</body>

</html>