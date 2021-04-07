<?php

    session_start();

    require_once "../model/conexionEquipos.php";
    require_once "../model/conexionMunicipios.php";

    $conexionMunicipios = new ConexionMunicipios();
    $conexionMunicipios->abir();
    
    $municipios = $conexionMunicipios->obtenerMunicipios();
    $conexionMunicipios->cerrar();

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();

    $equipos = $conexionEquipos->obtenerEquipoId($_GET["id"]);
    $conexionEquipos->cerrar();

    $equipo = $equipos[0];

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/equipos/vequiposedit.php";
        require_once "../view/partials/footer.php";
    } 
    else
    {
        header("location:../index.php");
    }

    // require_once "../view/partials/header.php";
    // require_once "../view/equipos/vequiposedit.php";
    // require_once "../view/partials/footer.php";

?>