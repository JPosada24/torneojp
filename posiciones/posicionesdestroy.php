<?php
    session_start();
    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();

    $filas = $conexionPosiciones->eliminarPosicion($_GET["id"]);

    $conexionPosiciones->cerrar();

    if (isset($_SESSION["usuario"])) 
    {
        if ($filas > 0)
        {
            header("location:posicionesindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
        }
        else
        {
            header("location:posicionesindex.php?accion=7"); //NO SE PUDO ELIMINAR.
        }
    
    } 
    else
    {
        header("location:../index.php");
    }

    // if ($filas > 0)
    // {
    //     header("location:posicionesindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
    // }
    // else
    // {
    //     header("location:posicionesindex.php?accion=7"); //NO SE PUDO ELIMINAR.
    // }

?>