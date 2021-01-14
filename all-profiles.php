<?php include "layout/header.php" ?>
<?php redirectIfNotAdmin() ?>

    <?php 
        $results = $db->query("
            SELECT *
            FROM user
        ");
    ?>

    <div class="container main-content">
        <h1>Профили</h1>

        <?php include "components/alert.php" ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Имейл</th>
                        <th scope="col">Първо име</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_array($results)) { ?>
                        <tr> 
                            <th scope="row"><?php echo $user["email"] ?></th>
                            <th scope="row"><?php echo $user["firstname"] ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include "layout/footer.php" ?>