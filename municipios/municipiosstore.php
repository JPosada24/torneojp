<?php

    session_start();

    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();
    $municipios = $conexionMunicipios->obtenerMunicipioNombre($_POST["nombre"]);

    if (isset($_SESSION["usuario"])) 
    {

        if (count($municipios) > 0) 
        {
            header("location:municipiosindex.php?accion=1"); //MUNICIPIO EXISTE.
            $conexionMunicipios->cerrar();
        }
        else
        {
            require_once "../model/municipio.php";
    
            $municipio = new Municipio();
        
            $municipio->nombre = $_POST["nombre"];
        
            $filas = $conexionMunicipios->insertarMunicipio($municipio);
        
            $conexionMunicipios->cerrar();
        
            if ($filas > 0)
            {
                header("location:municipiosindex.php?accion=2"); //MUNICIPIO SE INSERTÓ.
            }
            else
            {
                header("location:municipiosindex.php?accion=3"); //NO SE PUDO INSERTAR.
            }
        }
    
    } 
    else
    {
        header("location:../index.php");
    }


?>