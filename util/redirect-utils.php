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

?>