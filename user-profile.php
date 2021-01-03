<?php include "layout/header.php" ?>
    <?php redirectIfNotLogged() ?>

    <div class="container main-content">
        <div class="row">
            <div class="col-sm-3">
            <img src="http://via.placeholder.com/300x250" class="img-rounded"/>
            </div>
            <div class="col-sm-3">
                <h4 class="fw-bolder">Име:</h4>
                <h4 class="text-muted"><?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></h4>
                <h4 class="fw-bolder">Имейл:</h4>
                <h4 class="text-muted"><?php echo $_SESSION["user"]["email"]; ?></h4>
                <h4 class="fw-bolder">Телефон:</h4>
                <h4 class="text-muted"><?php echo $_SESSION["user"]["phone"]; ?></h4>
            </div>
            <div class="col-sm-3">
                <form action="user-profile-edit.php">
                    <input class="btn btn-primary" type="submit" value="Редактирай данни" />
                </form>
            </div>        
        </div>   
    </div>
<?php include "layout/footer.php" ?>