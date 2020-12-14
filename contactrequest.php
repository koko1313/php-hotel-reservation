<?php $current_page = "contactrequest" ?>

<?php include "layout/header.php" ?>

<?php redirectIfNotLoggedAdmin() ?>

    <?php 
        $results = $db->query("
            SELECT *
            FROM contactform
        ");
    ?>

    <div class="container main-content">
        <h1>Съобщения от контакти</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Име и Фамилия</th>
                    <th scope="col">Имейл</th>
                    <th style="min-width:700px" scope="col">Съобщение</th>
                </tr>
            </thead>
            <tbody>
                <?php while($contactform = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <th scope="row"><?php echo $contactform["name"] ?></th>
                        <td><?php echo $contactform["email"] ?></td>
                        <td><?php echo $contactform["text"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php include "layout/footer.php" ?>