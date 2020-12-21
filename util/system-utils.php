<?php

    function getCurrentPageName() {
        return basename($_SERVER["SCRIPT_FILENAME"], ".php");
    }

    // type = successMessage | warningMessage | dangerMessage
    function setMessage($type, $message) {
        // setcookie($type, $message);
        redirectTo("?$type=$message");
    }

    function setMessageAndRedirect($type, $message, $location) {
        redirectTo("$location?$type=$message");
    }

?>