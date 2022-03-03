<?php
$titulo = "Dashboard";
require_once 'funcoes/navbar.php';

$tipoCONTA = $_SESSION["TIPO_CONTA"];
$logado = $_SESSION["LOGADO"];

if ($logado != 'true' && $tipoCONTA != 'admin') {
    header('Location: index');
}

if ($_SESSION["TIPO_CONTA"] == 'visitante' || $_SESSION["TIPO_CONTA"] == 'utilizador') {
    header('Location: index');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_mensagem = $_GET['id'];
    $tipo = $_GET['tipo'];
    $email = $_SESSION["email"];
    $resposta = $_POST["resposta"];

    if ($tipo == 1) {
        # alterar estado encomenda
    }
    else if ($tipo == 2) {
        # responder

        # temos de alterar o estado na tabela mensagens_ajuda para respondida
        # adicionar a resposta na tabela mensagens_resposta

        try {
            $sql = "UPDATE mensagens_ajuda SET estado = 1 WHERE id_mensagem = $id";

            $result = $link->exec($sql);
            unset($sql);

            $sql = "INSERT INTO mensagens_resposta(id_mensagem, resposta) VALUES($id, '$resposta')";
            $result = $link->exec($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
?>
    <div class="a text-center mb-4" style="background-image: url('./imagens/aleatorias/a.jpg'); height: 300px;">
        <div class="container text-center" style="width: 700px; padding-top: 90px;"></div>
        <h2 class="fw-bold text-white" style="font-size: 70px;">Dashboard</h2>
        <p class="fw-light text-white fs-2">Área do admin</p>
    </div>
    <div class="container">
        <?php
        if (isset($_GET['err'])) {
        ?>
            <div class="alert alert-danger text-center"><?php echo "Erro ao carregar imagem!"; ?>
            </div>
        <?php
        }
        ?>
        <h2>Carregar imagens para a galeria</h2>
        <p>Clique <a class="text-decoration-none text-danger" href="galeria">aqui</a> para visitar a galeria</p>
        <form action="./funcoes/uploadImages.php" method="post" enctype="multipart/form-data">
            Selecione uma imagem:
            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="width: 600px;" required>
            <input style="width: 150px;" class="form-control my-1" type="submit" value="Carregar imagem" name="submit">
        </form>
    </div>
    <div class="container mt-3">
        <h2>Encomendas</h2>
        <p>Dados disponíveis</p>
        <table class="table">
            <thead>
                <tr>
                    <th>id do encomenda</th>
                    <th>id do cliente</th>
                    <th>Detalhes</th>
                    <th>Tipo de massa</th>
                    <th>Tipo de recheio</th>
                    <th>Tipo de bolo</th>
                    <th>Data</th>
                    <th>Preço</th>
                    <th>Morada de envio</th>
                    <th>Estado da encomenda</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once 'funcoes/db.php';

                $sql = "SELECT * FROM encomendas";
                foreach ($link->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id_encomenda"] . "</td>";
                    echo "<td>" . $row["id_cliente"] . "</td>";
                    echo "<td>" . $row["detalhes"] . "</td>";
                    echo "<td>" . $row["tipo_massa"] . "</td>";
                    echo "<td>" . $row["tipo_recheio"] . "</td>";
                    echo "<td>" . $row["tipo_bolo"] . "</td>";
                    echo "<td>" . $row["data_compra"] . "</td>";
                    echo "<td>" . $row["preco"] . "</td>";
                    echo "<td>" . $row["morada_envio"] . "</td>";
                    echo "<td>" . $row["estado_encomenda"] . "</td>";
                    echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalEstado'>Editar estado</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal" id="modalEstado">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Alterar estado encomenda</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Estado</p>
                        <select name="ESTADO_ENCOMENDA" class="col-sm-3 mb-3 text-black form-select">
                            <option value="1">Por processar</option>
                            <option value="2">Em processamento</option>
                             <option value="3">Em entrega</option>
                            <option value="4">Entregue</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <h2>Mensagens de ajuda</h2>
        <p>Dados disponíveis</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Id mensagem</th>
                    <th>Email cliente</th>
                    <th>Comentario</th>
                    <th>Data envio</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once 'funcoes/db.php';

                $sql = "SELECT * FROM mensagens_ajuda";
                foreach ($link->query($sql) as $row) {
                    $id = $row["id_mensagem"];
                    echo "<tr>";
                    echo "<td>" . $row["id_mensagem"] . "</td>";
                    echo "<td>" . $row["email_cliente"] . "</td>";
                    echo "<td>" . $row["comentario"] . "</td>";
                    echo "<td>" . $row["data_envio"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["estado"] . "</td>";
                    echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalResponder'><a href='dashboard?id=$id?tipo=2'>Responder</a></button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal" id="modalResponder">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Responder mensagem</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Estado</p>
                        <select name="ESTADO_ENCOMENDA" class="col-sm-3 mb-3 text-black form-select">
                            <option value="1">Por processar</option>
                            <option value="2">Em processamento</option>
                             <option value="3">Em entrega</option>
                            <option value="4">Entregue</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container my-3 fw-bold">
        <h2>Dados</h2>
        <div class="row text-center text-black">
            <div class="col mx-2 p-3" style="background-color: #FCFCFC;">
                <div class="esquerda d-inline-block mx-5">
                    <i class="fas fa-dollar-sign fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="direita d-inline-block text-start" style="width: 300px">
                    <h2 class="fs-3 fw-bold text-black">Vendas</h2>
                    <p>01-12-2021 | 12-01-2022</p>
                    <p class="fw-bold fs-2">
                        <?php
                        require_once 'funcoes/db.php';

                        $stmt = $link->prepare('SELECT SUM(preco) AS value_sum FROM encomendas');
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $sum = $row['value_sum'];

                        echo $sum . "€";
                        ?>
                    </p>
                </div>
            </div>
            <div class="col mx-2 p-3" style="background-color: #FCFCFC;">
                <div class="esquerda d-inline-block mx-5">
                    <i class="fas fa-star fa-6x" style="color:rgb(255, 0, 98)"></i>
                </div>
                <div class="direita d-inline-block text-start" style="width: 300px">
                    <h2 class="fs-3 fw-bold text-black">Feedback</h2>
                    <p>01-12-2021 | 12-01-2022</p>
                    <p class="fw-bold fs-2">4.32/5</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="container text-end">
            <h2>Vendas</h2>
            <p>Dados disponíveis</p>
        </div>
        <canvas id="myChart" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
    </div>
    <?php
    include_once './funcoes/footer.php';
    ?>
    <script src="https://kit.fontawesome.com/52c6714f28.js" crossorigin="anonymous"></script>
</body>
</html>