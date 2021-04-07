<?php

    session_start();

    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();

    $municipios = $conexionMunicipios->obtenerMunicipioId($_GET["id"]);
    $conexionMunicipios->cerrar();

    $municipio = $municipios[0];

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/municipios/vmunicipiosedit.php";
        require_once "../view/partials/footer.php";
    
    } 
    else
    {
        header("location:../index.php");
    }


?>