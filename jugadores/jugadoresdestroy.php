<?php
    session_start();
    require_once "../model/conexionJugadores.php";

    $conexionJugadores = new ConexionJugadores();
    $conexionJugadores->abir();

    $filas = $conexionJugadores->eliminarJugador($_GET["id"]);

    $conexionJugadores->cerrar();

    if ($filas > 0)
    {
        header("location:jugadoresindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
    }
    else
    {
        header("location:jugadoresindex.php?accion=7"); //NO SE PUDO ELIMINAR.
    }

?>