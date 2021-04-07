<?php
    session_start();

    if (isset($_SESSION["usuario"])) 
    {
        require_once "../view/partials/header.php";
        require_once "../view/municipios/vmunicipioscreate.php";
        require_once "../view/partials/footer.php";
    
    } 
    else
    {
        header("location:../index.php");
    }

?>