<?php 

    function redirectIfLogged() {
        if(isset($_SESSION["user"])) {
            redirectTo("index.php");
        }
    }

    function redirectIfNotLogged() {
        if(!isset($_SESSION["user"])) {
            redirectTo("index.php");
        }
    }

    function redirectIfNotAdmin() {
        redirectIfNotLogged();

        if(isset($_SESSION['user']) && $_SESSION["user"]["roleid"] != 1) {
            redirectTo("index.php");
        }
    }

    function redirectIfAdmin() {
        if(isset($_SESSION['user']) && $_SESSION["user"]["roleid"] == 1) {
            redirectTo("index.php");
        }
    }


    function redirectTo($location) {
        echo "<script>location.replace('index.php')</script>";
    }
?>