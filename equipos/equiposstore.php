<?php

    session_start();
    require_once "../model/conexionEquipos.php";

    $conexionEquipos = new ConexionEquipos();
    $conexionEquipos->abir();
    $equipos = $conexionEquipos->obtenerEquipoNombre($_POST["nombre"]);
    
    if (isset($_SESSION["usuario"])) 
    {
        if (count($equipos) > 0) 
        {
            header("location:equiposindex.php?accion=1"); //EQUIPO EXISTE.
            $conexionEquipos->cerrar();
        }
        else
        {
            require_once "../model/equipo.php";
    
            $equipo = new Equipo();
        
            $equipo->nombre = $_POST["nombre"];
            $equipo->dt = $_POST["dt"];
            $equipo->municipio = $_POST["municipio"];
        
            $filas = $conexionEquipos->insertarEquipo($equipo);
        
            $conexionEquipos->cerrar();
        
            if ($filas > 0)
            {
                header("location:equiposindex.php?accion=2"); //EQUIPO SE INSERTÓ.
            }
            else
            {
                header("location:equiposindex.php?accion=3"); //NO SE PUDO INSERTAR.
            }
        }
    } 
    else
    {
        header("location:../index.php");
    }

    // if (count($equipos) > 0) 
    // {
    //     header("location:equiposindex.php?accion=1"); //EQUIPO EXISTE.
    //     $conexionEquipos->cerrar();
    // }
    // else
    // {
    //     require_once "../model/equipo.php";

    //     $equipo = new Equipo();
    
    //     $equipo->nombre = $_POST["nombre"];
    //     $equipo->dt = $_POST["dt"];
    //     $equipo->municipio = $_POST["municipio"];
    
    //     $filas = $conexionEquipos->insertarEquipo($equipo);
    
    //     $conexionEquipos->cerrar();
    
    //     if ($filas > 0)
    //     {
    //         header("location:equiposindex.php?accion=2"); //EQUIPO SE INSERTÓ.
    //     }
    //     else
    //     {
    //         header("location:equiposindex.php?accion=3"); //NO SE PUDO INSERTAR.
    //     }
    // }

?>