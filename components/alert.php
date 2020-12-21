<?php

    if(isset($_GET["successMessage"])) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">'.
                $_GET["successMessage"]
                .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
        // setcookie("successMessage", "", time() - 3600);
    }

    if(isset($_GET["warningMessage"])) {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">'.
                $_GET["warningMessage"]
                .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

    if(isset($_GET["dangerMessage"])) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">'.
                $_GET["dangerMessage"]
                .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

?>