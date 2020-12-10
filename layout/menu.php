<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Тук слагаме логото!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($current_page == 'index') echo 'active' ?>" aria-current="page" href="index.php">Начало</a>
                </li>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($current_page == 'reservations') echo 'active' ?>" aria-current="page" href="reservations.php">Резервации</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($current_page == 'my-reservations') echo 'active' ?>" aria-current="page" href="my-reservations.php">Мои резервации</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-right">
                <?php if (isset($_SESSION['user'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Изход</a>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($current_page == 'registration') echo 'active' ?>" aria-current="page" href="registration.php">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($current_page == 'login') echo 'active' ?>" aria-current="page" href="login.php">Вход</a>
                    </li>
                <?php };?>
            </ul>
        </div>
    </div>
</nav>