<?php

    session_start();
    
    require_once "../model/conexionEquipos.php";

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();

    $filas = $conexionEquipos->eliminarEquipo($_GET["id"]);

    $conexionEquipos->cerrar();

    if ($filas > 0)
    {
        header("location:equiposindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
    }
    else
    {
        header("location:equiposindex.php?accion=7"); //NO SE PUDO ELIMINAR.
    }

    // if (isset($_SESSION["usuario"])) 
    // {
    //     if ($filas > 0)
    //     {
    //         header("location:equiposindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
    //     }
    //     else
    //     {
    //         header("location:equiposindex.php?accion=7"); //NO SE PUDO ELIMINAR.
    //     }
    // } 
    // else
    // {
    //     header("location:../index.php");
    // }

?>