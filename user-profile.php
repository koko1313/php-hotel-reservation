<?php include "layout/header.php" ?>
    <?php redirectIfNotLogged() ?>

    <div class="container main-content">
    
        <?php include "components/alert.php" ?>

        <div class="row">
            <div class="col-sm-3 text-center">
                <?php if($_SESSION["user"]["image"] != null) { ?>
                    <img src="picture/profile-images/<?php echo $_SESSION["user"]["image"] ?>" class="img-rounded img-fluid"/>
                <?php } else { ?>
                    <img src="picture/profile-images/unknown.jpg" class="img-rounded img-fluid"/>
                <?php } ?>

                <a class="btn btn-secondary mx-auto mt-3" href="user-image-edit.php">Редактирай снимка</a>
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
                    <input class="btn btn-secondary" type="submit" value="Редактирай данни" />
                </form>
            </div>        
        </div>   
    </div>
<?php include "layout/footer.php" ?>