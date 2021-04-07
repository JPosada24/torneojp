<?php
    session_start();

    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();
    $municipios = $conexionMunicipios->obtenerMunicipios();
    $conexionMunicipios->cerrar();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/equipos/vequiposcreate.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }

?>