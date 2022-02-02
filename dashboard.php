<?php
session_start();

require_once './funcoes/db.php';

$tipoCONTA = $_SESSION["TIPO_CONTA"];
$logado = $_SESSION["LOGADO"];

if ($logado != 'true' && $tipoCONTA != 'admin') {
    header('Location: index.php');
}

if ($_SESSION["TIPO_CONTA"] == 'visitante' || $_SESSION["TIPO_CONTA"] == 'utilizador') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="./imagens/Logotipo.png">
    <script src="./css/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title> Mãos na massa - Encomendar</title>
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
                $email = $_SESSION["email"];
                $sql = "SELECT * FROM Utilizadores WHERE email = '$email'";

                $result = $link->query($sql);
                $row = $result->fetch();

                $img_name = $row["profile_pic_img"];
                if ($_SESSION["LOGADO"] == "true") {
                    echo '<ul class="text-right nav navbar-nav flex-row justify-content-md-center justify-content-end flex-nowrap ms-auto">
                    <li class="nav-item align-end"><a href="perfil.php" class="nav-link text-danger">' . $_SESSION["email"] . '</a></li>
                    <img src="imagens/profilepics/'. $img_name .'" alt="mdo" width="32" height="32" class="rounded-circle">
                    <li class="nav-item"><a href="./funcoes/logout.php" class="nav-link text-danger">Sair</a></li>
                    </ul>';
                }
                ?>
            </div>
        </div>
    </nav>
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
        <p>Clique <a class="text-decoration-none text-danger" href="galeria.php">aqui</a> para visitar a galeria</p>
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
                </tr>
            </thead>
            <tbody>
                <?php

                require_once 'funcoes/db.php';

                $sql = "SELECT * FROM mensagens_ajuda";
                foreach ($link->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id_mensagem"] . "</td>";
                    echo "<td>" . $row["email_cliente"] . "</td>";
                    echo "<td>" . $row["comentario"] . "</td>";
                    echo "<td>" . $row["data_envio"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["estado"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
        <canvas id="salesChart" width="400" height="200"></canvas>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pastelaria', 'Bolos', 'Bolos customizados', 'Outros'],
                    datasets: [{
                        label: '# de Vendas',
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