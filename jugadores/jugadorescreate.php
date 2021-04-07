<?php
    session_start();
    require_once "../model/conexionEquipos.php";

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();
    $equipos = $conexionEquipos->obtenerEquipos();
    $conexionEquipos->cerrar();

    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();
    $posiciones = $conexionPosiciones->obtenerPosiciones();
    $conexionPosiciones->cerrar();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/jugadores/vjugadorcreate.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }

    // require_once "../view/partials/header.php";
    // require_once "../view/jugadores/vjugadorcreate.php";
    // require_once "../view/partials/footer.php";

?>