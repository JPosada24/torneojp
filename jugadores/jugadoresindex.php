<?php

    session_start();

    if (isset($_GET["accion"]))
    {
        switch ($_GET["accion"]) {
            case '1':
                $clase = "alert alert-warning";
                $mensaje = "Este jugador ya existe!";
                break;

            case '2':
                $clase = "alert alert-success";
                $mensaje = "El jugador se insertó correctamente";
                break;

            case '3':
                $clase = "alert alert-danger";
                $mensaje = "El jugador no se pudo insertar";
                break;

            case '4':
                $clase = "alert alert-success";
                $mensaje = "El jugador se actualizó correctamente.";
                break;

            case '5':
                $clase = "alert alert-danger";
                $mensaje = "El jugador no se pudo actualizar";
                break;

            case '6':
                $clase = "alert alert-success";
                $mensaje = "El jugador se eliminó correctamente.";
                break;

            case '7':
                $clase = "alert alert-danger";
                $mensaje = "El jugador no se pudo eliminar.";
                break;
            
            default:
                
                break;
        }
    }

    require_once "../model/conexionJugadores.php";

    $conexionJugadores = new ConexionJugadores();
    $conexionJugadores->abir();
    $jugadores = $conexionJugadores->obtenerJugadores();
    $conexionJugadores->cerrar();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/jugadores/vjugadoresindex.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }

    // require_once "../view/partials/header.php";
    // require_once "../view/jugadores/vjugadoresindex.php";
    // require_once "../view/partials/footer.php";

?>