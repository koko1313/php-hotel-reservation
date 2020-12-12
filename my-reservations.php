<?php include "layout/header.php" ?>

    <?php redirectIfNotLogged() ?>

    <?php 
        $current_page = 'my-reservations';
        include "layout/menu.php";
    ?>

    <h1>Мои резервации</h1>

<?php include "layout/footer.php" ?>