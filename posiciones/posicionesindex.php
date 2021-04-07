<?php
    session_start();

    if (isset($_GET["accion"]))
    {
        switch ($_GET["accion"]) {
            case '1':
                $clase = "alert alert-warning";
                $mensaje = "Esta posición ya existe!";
                break;

            case '2':
                $clase = "alert alert-success";
                $mensaje = "La posición se insertó correctamente";
                break;

            case '3':
                $clase = "alert alert-danger";
                $mensaje = "La posición no se pudo insertar";
                break;

            case '4':
                $clase = "alert alert-success";
                $mensaje = "La posición se actualizó correctamente.";
                break;

            case '5':
                $clase = "alert alert-danger";
                $mensaje = "La posición no se pudo actualizar";
                break;

            case '6':
                $clase = "alert alert-success";
                $mensaje = "La posición se eliminó correctamente.";
                break;

            case '7':
                $clase = "alert alert-danger";
                $mensaje = "La posición no se pudo eliminar.";
                break;
            
            default:
                
                break;
        }
    }

    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();
    $posiciones = $conexionPosiciones->obtenerPosiciones();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/posiciones/vposicionesindex.php";
        require_once "../view/partials/footer.php";
    
    } 
    else
    {
        header("location:../index.php");
    }

    // require_once "../view/partials/header.php";
    // require_once "../view/posiciones/vposicionesindex.php";
    // require_once "../view/partials/footer.php";

?>