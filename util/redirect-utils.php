<?php 

    function redirectIfLogged() {
        if(isset($_SESSION["user"])) {
            header("Location: index.php"); 
            exit();
        }
    }

    function redirectIfNotLogged() {
        if(!isset($_SESSION["user"])) {
            header("Location: index.php"); 
            exit();
        }
    }

    function redirectIfNotLoggedAdmin() {
        if(!isset($_SESSION["admin"])) {
            header("Location: index.php"); 
            exit();
        }
    }

    function redirectIfLoggedAdmin() {
        if(isset($_SESSION["admin"])) {
            header("Location: index.php"); 
            exit();
        }
    }

?>