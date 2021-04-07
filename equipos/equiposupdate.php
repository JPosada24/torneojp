<?php
    session_start();
    require_once "../model/conexionEquipos.php";

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();

        require_once "../model/equipo.php";

        $equipo = new Equipo();

        $equipo->id = $_POST["id"];

        $equipo->nombre = $_POST["nombre"];

        $equipo->dt = $_POST["dt"];

        $equipo->municipio = $_POST["municipio"];

        $filas = $conexionEquipos->actualizarEquipo($equipo);

        $conexionEquipos->cerrar();

        if ($filas > 0)
        {
            header("location:equiposindex.php?accion=4"); //MUNICIPIO SE ACTUALIZÓ.
        }
        else
        {
            header("location:equiposindex.php?accion=5"); //NO SE PUDO ACTUALIZAR.
        }

?>