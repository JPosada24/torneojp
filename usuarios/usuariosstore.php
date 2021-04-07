<?php

    require_once "../model/conexionUsuarios.php";

    $conexionUsuarios = new ConexionUsuarios();
    $conexionUsuarios->abir();
    $usuarios = $conexionUsuarios->obtenerUsuarioUsuario($_POST["usuario"]);

    if (count($usuarios) > 0) 
    {
        header("location:../index.php?accion=1"); //USUARIO EXISTE.
        $conexionUsuarios->cerrar();
    }
    else
    {
        require_once "../model/usuario.php";

        $usuario = new Usuario();
    
        $usuario->usuario = $_POST["usuario"];
        $usuario->password = $_POST["password"];
    
        $filas = $conexionUsuarios->insertarUsuario($usuario);
    
        $conexionUsuarios->cerrar();
    
        if ($filas > 0)
        {
            header("location:../index.php?accion=2"); //USUARIO SE INSERTÓ.
        }
        else
        {
            header("location:../index.php?accion=3"); //NO SE PUDO INSERTAR.
        }
    }

?>