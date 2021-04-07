<?php

    session_start();

    require_once "model/conexionUsuarios.php";
    require_once "model/usuario.php";

    $usuario = new Usuario();
    
    $usuario->usuario = $_POST["usuario"];
    $usuario->password = $_POST["password"];

    $conexionUsuarios = new ConexionUsuarios();
    $conexionUsuarios->abir();
    $usuarios = $conexionUsuarios->obtenerUsuarioUsuarioPassword($usuario);
    $conexionUsuarios->cerrar();

    if (count($usuarios) > 0) 
    {
        $usuario = $usuarios[0];
        $_SESSION["usuario"] = $usuario->usuario;
        header("location:index.php?accion=1"); //USUARIO EXISTE.
    }
    else
    {
        header("location:index.php");
    }


?>