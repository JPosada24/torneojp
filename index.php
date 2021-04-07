<?php

    session_start();

    if (isset($_SESSION["usuario"])) {
        header("location:index/index.php");
    }
    else
    {
        require_once "view/partials/header1.php";
        require_once "view/vindex.php";
        require_once "view/partials/footer.php";
    }

?>