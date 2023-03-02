<?php
include "model/conexion.php";
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
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <form class="d-flex" action="" method="post">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                       name="filtro" required>
                                <button class="btn btn-outline-success" type="submit" name="buscar">Search</button>
                            </form>
                            <li class="nav-item dropdown mx-5">

                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"> </i>
                                     <?php echo $_SESSION['usuario'] ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-check"></i> Disponible</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-exclamation"></i> Ocupado</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-slash"></i> Ausente</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-x"></i> No conectado</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Salir</a></li>
                                </ul>
                            </li>
                        </ul>

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
                    <a href="" class="float-end"><i class="bi bi-plus-lg"></i></a>
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
<?php include 'template/footer.php' ?>