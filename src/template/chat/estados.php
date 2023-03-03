<?php
include 'src/crud/repositories/EstadosRepository.php';
$estadoRepository = new EstadosRepository();

?>

<ul class="navbar-nav m-auto mb-2 mb-lg-0">
    <form class="d-flex" action="" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
               name="filtro" required>
        <button class="btn btn-outline-success" type="submit" name="buscar">Search</button>
    </form>
    <li class="nav-item mx-5">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"
           style="color: black"><?php echo $estadoRepository->getEstado($_SESSION['estado'])?>
        </a>
    </li>
    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
           data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"> </i>
            <?php echo $_SESSION['usuario'] ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="estado.php?estado=0"><i
                        class="bi bi-person-check"></i> Disponible</a></li>
            <li><a class="dropdown-item" href="estado.php?estado=1"><i
                        class="bi bi-person-exclamation"></i> Ocupado</a></li>
            <li><a class="dropdown-item" href="estado.php?estado=2"><i
                        class="bi bi-person-slash"></i> Ausente</a></li>
            <li><a class="dropdown-item" href="estado.php?estado=3"><i
                        class="bi bi-person-x"></i> No conectado</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i>
                    Salir</a></li>
        </ul>
    </li>

</ul>
