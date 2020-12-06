<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    $db = new mysqli($server, $username, $password, $dbname);
    $db->set_charset("UTF8");
?>