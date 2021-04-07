<?php

    session_start();
    
    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();
    $municipios = $conexionMunicipios->obtenerMunicipioNombre($_POST["nombre"]);

    if (count($municipios) > 0) 
    {
        header("location:municipiosindex.php?accion=1"); //MUNICIPIO EXISTE.
        $conexionMunicipios->cerrar();
    }
    else
    {
        require_once "../model/municipio.php";

        $municipio = new Municipio();

        $municipio->id = $_POST["id"];

        $municipio->nombre = $_POST["nombre"];

        $filas = $conexionMunicipios->actualizarMunicipio($municipio);

        $conexionMunicipios->cerrar();

        if ($filas > 0)
        {
            header("location:municipiosindex.php?accion=4"); //MUNICIPIO SE ACTUALIZÓ.
        }
        else
        {
            header("location:municipiosindex.php?accion=5"); //NO SE PUDO ACTUALIZAR.
        }
    }

?>