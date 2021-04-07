<?php

    session_start();

    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();

    $posiciones = $conexionPosiciones->obtenerPosicionId($_GET["id"]);
    $conexionPosiciones->cerrar();

    $posicion = $posiciones[0];

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/posiciones/vposicionesedit.php";
        require_once "../view/partials/footer.php";    
    
    } 
    else
    {
        header("location:../index.php");
    }

    // require_once "../view/partials/header.php";
    // require_once "../view/posiciones/vposicionesedit.php";
    // require_once "../view/partials/footer.php";

?>