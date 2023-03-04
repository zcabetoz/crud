<?php

use services\SalaService;

include_once "src/services/SalaService.php";

$salaServie = new SalaService();
if (isset($_GET['idSala'])) {
    $idSala = $_GET['idSala'];
} else {
    $idSala = "";//$salas[0]->id_sala;
}
$mensajes = $salaServie->getMensajes($idSala);
?>
<?php foreach ($mensajes as $mensaje) {
    if ($mensaje['id_usuario'] == $_SESSION['id']) {
        $color = '#2551d5';
        $fondo = 'antiquewhite';
    } else {
        $color = '#00FF00';
        $fondo = 'aquamarine';
    }

    ?>
    <span style=
          "color: <?php echo $color ?>;
                  padding-left:50px;
">
        <b><?php echo $mensaje['usuario'] ?>:</b>
    </span>
    <br>
    <span style=
          "padding-left: 80px;
                  color: <?php echo $color ?>">

        <?php echo $mensaje['mensaje'] ?></span>
    <br>
<?php } ?>