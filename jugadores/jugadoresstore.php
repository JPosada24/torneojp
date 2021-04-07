<?php
    session_start();
    require_once "../model/conexionJugadores.php";

    $conexionJugadores = new ConexionJugadores();
    $conexionJugadores->abir();
    $jugadores = $conexionJugadores->obtenerJugadorDocumento($_POST["documento"]);

    if (isset($_SESSION["usuario"])) 
    {
        if (count($jugadores) > 0) 
        {
            header("location:jugadoresindex.php?accion=1"); //EQUIPO EXISTE.
            $conexionJugadores->cerrar();
        }
        else
        {
            require_once "../model/jugador.php";
    
            $jugador = new Jugador();
        
            $jugador->documento = $_POST["documento"];
            $jugador->nombre = $_POST["nombre"];
            $jugador->equipo = $_POST["equipo"];
            $jugador->posicion = $_POST["posicion"];
        
            $filas = $conexionJugadores->insertarJugador($jugador);
        
            $conexionJugadores->cerrar();
        
            if ($filas > 0)
            {
                header("location:jugadoresindex.php?accion=2"); //EQUIPO SE INSERTÓ.
            }
            else
            {
                header("location:jugadoresindex.php?accion=3"); //NO SE PUDO INSERTAR.
            }
        }
    } 
    else
    {
        header("location:../index.php");
    }

    // if (count($jugadores) > 0) 
    // {
    //     header("location:jugadoresindex.php?accion=1"); //EQUIPO EXISTE.
    //     $conexionJugadores->cerrar();
    // }
    // else
    // {
    //     require_once "../model/jugador.php";

    //     $jugador = new Jugador();
    
    //     $jugador->documento = $_POST["documento"];
    //     $jugador->nombre = $_POST["nombre"];
    //     $jugador->equipo = $_POST["equipo"];
    //     $jugador->posicion = $_POST["posicion"];
    
    //     $filas = $conexionJugadores->insertarJugador($jugador);
    
    //     $conexionJugadores->cerrar();
    
    //     if ($filas > 0)
    //     {
    //         header("location:jugadoresindex.php?accion=2"); //EQUIPO SE INSERTÓ.
    //     }
    //     else
    //     {
    //         header("location:jugadoresindex.php?accion=3"); //NO SE PUDO INSERTAR.
    //     }
    // }

?>