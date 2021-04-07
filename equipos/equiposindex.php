<?php
    session_start();

    if (isset($_SESSION["usuario"])) 
    {

        if (isset($_GET["accion"]))
        {
            switch ($_GET["accion"]) {
                case '1':
                    $clase = "alert alert-warning";
                    $mensaje = "Este equipo ya existe!";
                    break;
    
                case '2':
                    $clase = "alert alert-success";
                    $mensaje = "El equipo se insertó correctamente";
                    break;
    
                case '3':
                    $clase = "alert alert-danger";
                    $mensaje = "El equipo no se pudo insertar";
                    break;
    
                case '4':
                    $clase = "alert alert-success";
                    $mensaje = "El equipo se actualizó correctamente.";
                    break;
    
                case '5':
                    $clase = "alert alert-danger";
                    $mensaje = "El equipo no se pudo actualizar";
                    break;
    
                case '6':
                    $clase = "alert alert-success";
                    $mensaje = "El equipo se eliminó correctamente.";
                    break;
    
                case '7':
                    $clase = "alert alert-danger";
                    $mensaje = "El equipo no se pudo eliminar.";
                    break;
                
                default:
                    
                    break;
            }
        }
    } 

    require_once "../model/conexionEquipos.php";

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();
    $equipos = $conexionEquipos->obtenerEquipos();
    $conexionEquipos->cerrar();

    
    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/equipos/vequiposindex.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }



?>