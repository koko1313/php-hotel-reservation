<?php include "layout/header.php" ?>

<?php redirectIfNotAdmin() ?>

    <?php 
        $results = $db->query("
            SELECT *
            FROM contactform
        ");

        if(isset($_GET["deleteContactRequest"])) {
            $db->query("DELETE FROM contactform WHERE id='". $_GET["deleteContactRequest"] ."'");

            $results = $db->query("
                SELECT *
                FROM contactform
            ");
        }
    ?>

    <div class="container main-content">
        <h1>Съобщения от контакти</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Име и Фамилия</th>
                        <th scope="col">Имейл</th>
                        <th scope="col">Съобщение</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($contactform = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <th scope="row"><?php echo $contactform["name"] ?></th>
                            <td><?php echo $contactform["email"] ?></td>
                            <td><?php echo $contactform["text"] ?></td>
                            <td>
                                <button class="btn btn-danger" onClick="location.replace('?deleteContactRequest=<?php echo $contactform["id"] ?>')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include "layout/footer.php" ?>