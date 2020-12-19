<?php include "layout/header.php" ?>

<?php redirectIfNotAdmin() ?>

    <?php 
        $results = $db->query("
            SELECT *
            FROM roomview ORDER BY roomnumber
        ");
    ?>

    <div class="container main-content">
        <h1>Всички стаи</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Номер на стаята</th>
                        <th scope="col">Брой легла</th>
                        <th scope="col">Тип стая</th>
                        <th scope="col">Гледка от прозореца</th>
 
                    </tr>
                </thead>
                <tbody>
                    <?php while($roomview = mysqli_fetch_array($results)) { ?>
                        <tr> 
                            <th scope="row"><?php echo $roomview["roomnumber"] ?></th>
                            <td><?php echo $roomview["bedcount"] ?></td>
                            <td><?php echo $roomview["roomtype"] ?></td>
                            <td><?php echo $roomview["windowview"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include "layout/footer.php" ?>