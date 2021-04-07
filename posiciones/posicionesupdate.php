<?php
    session_start();
    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();
    $posiciones = $conexionPosiciones->obtenerPosicionNombre($_POST["nombre"]);

    if (count($posiciones) > 0) 
    {
        header("location:posicionesindex.php?accion=1"); //MUNICIPIO EXISTE.
        $conexionPosiciones->cerrar();
    }
    else
    {
        require_once "../model/posicion.php";

        $posicion = new Posicion();

        $posicion->id = $_POST["id"];

        $posicion->nombre = $_POST["nombre"];

        $filas = $conexionPosiciones->actualizarPosicion($posicion);

        $conexionPosiciones->cerrar();

        if ($filas > 0)
        {
            header("location:posicionesindex.php?accion=4"); //MUNICIPIO SE ACTUALIZÓ.
        }
        else
        {
            header("location:posicionesindex.php?accion=5"); //NO SE PUDO ACTUALIZAR.
        }
    }

?>