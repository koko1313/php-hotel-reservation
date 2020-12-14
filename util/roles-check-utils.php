<?php

    function isAdmin() {
        return isset($_SESSION["user"]) && $_SESSION["user"]["roleid"] == 1;
    }

?>