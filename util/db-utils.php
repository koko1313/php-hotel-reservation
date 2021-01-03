<?php

    function fetchUserSession() {
        $result = $GLOBALS["db"]->query("SELECT * FROM userview WHERE id = '". $_SESSION["user"]["id"]."'");
        $user = mysqli_fetch_array($result);
        $_SESSION ["user"] = $user;
    }

?>