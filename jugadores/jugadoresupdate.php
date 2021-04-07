<?php
    session_start();   
    require_once "../model/conexionJugadores.php";

    $conexionJugadores = new ConexionJugadores();
    $conexionJugadores->abir();
    $jugadores = $conexionJugadores->obtenerJugadorNombre($_POST["nombre"]);

        require_once "../model/jugador.php";

        $jugador = new Jugador();

        $jugador->documento = $_POST["id"];

        $jugador->nombre = $_POST["nombre"];

        $jugador->equipo = $_POST["equipo"];

        $jugador->posicion = $_POST["posicion"];

        $filas = $conexionJugadores->actualizarJugador($jugador);

        $conexionJugadores->cerrar();

        if ($filas > 0)
        {
            header("location:jugadoresindex.php?accion=4"); //MUNICIPIO SE ACTUALIZÓ.
        }
        else
        {
            header("location:jugadoresindex.php?accion=5"); //NO SE PUDO ACTUALIZAR.
        }

?>