<?php

    if(isset($_GET["successMessage"])) {
        echo '
            <div aria-live="polite" aria-atomic="true" class="d-flex flex-column align-items-end position-fixed fixed-bottom p-3">
                <div class="toast d-flex align-items-center mb-1 bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">'.
                        $_GET["successMessage"]
                    .'</div>
                    <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';
    }

    if(isset($_GET["warningMessage"])) {
        echo '
            <div aria-live="polite" aria-atomic="true" class="d-flex flex-column align-items-end position-fixed fixed-bottom p-3">
                <div class="toast d-flex align-items-center mb-1 bg-warning text-black" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">'.
                        $_GET["warningMessage"]
                    .'</div>
                    <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';
    }

    if(isset($_GET["dangerMessage"])) {
        echo '
            <div aria-live="polite" aria-atomic="true" class="d-flex flex-column align-items-end position-fixed fixed-bottom p-3">
                <div class="toast d-flex align-items-center mb-1 bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">'.
                        $_GET["dangerMessage"]
                    .'</div>
                    <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';
    }

?>