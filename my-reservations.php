<?php $current_page = 'my-reservations' ?>

<?php include "layout/header.php" ?>

    <?php redirectIfNotLogged() ?>

    <h1>Мои резервации</h1>

    <?php 
        $results = $db->query("
            SELECT *
            FROM reservationview
            WHERE clientid = '". $_SESSION["user"]["id"] ."'
        ");
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Резервация №</th>
                <th scope="col">Стая №</th>
                <th scope="col">Тип на стаята</th>
            </tr>
        </thead>
        <tbody>
            <?php while($reservation = mysqli_fetch_array($results)) { ?>
                <tr>
                    <th scope="row"><?php echo $reservation["reservationid"] ?></th>
                    <td><?php echo $reservation["roomnumber"] ?></td>
                    <td><?php echo $reservation["roomtype"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php include "layout/footer.php" ?>