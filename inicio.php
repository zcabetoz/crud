<?php
include "src/crud/repositories/conexion.php";
session_start();
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
                    <a href="src/controller/SalaController.php" class="float-end"><i class="bi bi-plus-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">
                    Conversasiones
                </div>
                <form class="p-4" action="" method="post">

                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'src/template/footer.php' ?>