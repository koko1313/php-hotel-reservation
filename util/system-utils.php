<?php

    function getCurrentPageName() {
        return basename($_SERVER["SCRIPT_FILENAME"], ".php");
    }

?>