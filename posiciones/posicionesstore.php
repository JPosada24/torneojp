<?php
    session_start();

    require_once "../model/conexionPosiciones.php";

    $conexionPosiciones = new ConexionPosiciones();
    $conexionPosiciones->abir();
    $posicion = $conexionPosiciones->obtenerPosicionNombre($_POST["nombre"]);

    if (isset($_SESSION["usuario"])) 
    {
        if (count($posicion) > 0) 
        {
            header("location:posicionesindex.php?accion=1"); //EQUIPO EXISTE.
            $conexionPosiciones->cerrar();
        }
        else
        {
            require_once "../model/posicion.php";
    
            $posicion = new Posicion();
        
            $posicion->nombre = $_POST["nombre"];
        
            $filas = $conexionPosiciones->insertarPosicion($posicion);
        
            $conexionPosiciones->cerrar();
        
            if ($filas > 0)
            {
                header("location:posicionesindex.php?accion=2"); //EQUIPO SE INSERTÓ.
            }
            else
            {
                header("location:posicionesindex.php?accion=3"); //NO SE PUDO INSERTAR.
            }
        }
    
    } 
    else
    {
        header("location:../index.php");
    }

    // if (count($posicion) > 0) 
    // {
    //     header("location:posicionesindex.php?accion=1"); //EQUIPO EXISTE.
    //     $conexionPosiciones->cerrar();
    // }
    // else
    // {
    //     require_once "../model/posicion.php";

    //     $posicion = new Posicion();
    
    //     $posicion->nombre = $_POST["nombre"];
    
    //     $filas = $conexionPosiciones->insertarPosicion($posicion);
    
    //     $conexionPosiciones->cerrar();
    
    //     if ($filas > 0)
    //     {
    //         header("location:posicionesindex.php?accion=2"); //EQUIPO SE INSERTÓ.
    //     }
    //     else
    //     {
    //         header("location:posicionesindex.php?accion=3"); //NO SE PUDO INSERTAR.
    //     }
    // }

?>