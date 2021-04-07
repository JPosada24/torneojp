<?php

    session_start();
    
    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();

    $filas = $conexionMunicipios->eliminarMunicipio($_GET["id"]);

    $conexionMunicipios->cerrar();

    if ($filas > 0)
    {
        header("location:municipiosindex.php?accion=6"); //MUNICIPIO SE ELIMINÓ.
    }
    else
    {
        header("location:municipiosindex.php?accion=7"); //NO SE PUDO ELIMINAR.
    }

?>