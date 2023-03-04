<?php

use repositories\SalaRepository;
use services\SalaService;

include_once "src/services/SalaService.php";

$salaServie = new SalaService();
$salas = $salaServie->getSalas();
if (isset($_GET['idSala'])) {
    $idSala = $_GET['idSala'];
} else {
    $idSala = "";//$salas[0]->id_sala;
}
$_SESSION['idSala'] = $idSala;
if (!isset($_SESSION['usuario']))
    header('location:index.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Chat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">
    <!-- cdn icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand"><h3><i class="bi bi-chat-dots"></i> Chat</h3></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php include 'src/template/chat/estados.php' ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">
                    chatear
                    <a href="src/controller/SalaController.php?action=crear_sala" class="float-end"><i
                                class="bi bi-plus-lg"></i></a>
                </div>
                <div class="card-body ">
                    <?php foreach ($salas as $sala) { ?>
                        <div>
                            Sala :
                            <a href="inicio.php?idSala=<?php echo $sala->id ?>">
                                <?php echo $sala->id; ?>
                            </a>
                            <?php if ($sala->id == $idSala) { ?>
                                <i class="bi bi-star float-end"></i>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Conversaciones: <?php if ($idSala != "") echo "Sala " . $idSala; ?></span>
                </div>
                <div id="mensajes" class="card-body" style="height: 250px;overflow-y: scroll">
                    <?php
                    if ($idSala == '') {
                        ?>
                        <div class="text-center">
                            <img src="assets/amigos.jpg" style="width: 30%; height: 30%;" class="img-responsive">
                            <h4 class="my-3">Seleccione una sala para comenzar a chatear</h4>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if ($idSala != '') {
                ?>
                <div class="card" style="margin-top: 10px">
                    <div class="card-body">
                        <form action="src/controller/SalaController.php?idSala=<?php echo $idSala ?>&action=enviar_mensaje"
                              method="post">
                            <input type="text" name="mensaje" class="form-control" required autofocus>
                            <input type="submit" name="enviar" value="Enviar" class="mt-2 float-end">
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include 'src/template/footer.php' ?>
<script>
    $(function () {
        loadMensajes();
    });

    function loadMensajes() {
        let $url = "mensajes.php?idSala=" + <?php echo $idSala; ?>;

        $("#mensajes").load($url);
        setTimeout(() => {
            loadMensajes();
        }, 1000);
    }
</script>
</body>
</html>

