<?php
    session_start();
    require_once "../model/conexionEquipos.php";
    require_once "../model/conexionJugadores.php";
    require_once "../model/conexionPosiciones.php";

    $conexionJugadores = new ConexionJugadores();
    $conexionJugadores->abir();
    $jugadores = $conexionJugadores->obtenerJugadorDocumento($_GET["id"]);
    $conexionJugadores->cerrar();

    $jugador = $jugadores[0];

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();
    $equipos = $conexionEquipos->obtenerEquipos();
    $conexionEquipos->cerrar();

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();
    $posiciones = $conexionPosiciones->obtenerPosiciones();
    $conexionPosiciones->cerrar();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/jugadores/vjugadoresedit.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }


?>