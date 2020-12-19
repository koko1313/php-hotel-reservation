<?php include "layout/header.php" ?>

    <?php 
        redirectIfNotLogged();
    ?>

    <?php 
        if(isAdmin()) {
            $results = $db->query("
            SELECT *
            FROM reservationview
        ");
        }else{
        $results = $db->query("
            SELECT *
            FROM reservationview
            WHERE userid = '". $_SESSION["user"]["id"] ."'
        ");}
    ?>

    <div class="container main-content">
    <?php if(isAdmin()) {
            echo "<h1>Всички резервации</h1>"
    ;}
    else{
       echo "<h1>Мои резервации</h1>"
    ;} 
    ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <?php 
                            if(isAdmin()) {
                                echo '
                                    <th scope="col">Резервация №</th>
                                    <th scope="col">Име</th>
                                    <th scope="col">Фамилия</th>
                                    <th scope="col">Стая №</th>
                                    <th scope="col">Тип на стаята</th>
                                    <th scope="col">От дата</th>
                                    <th scope="col">До дата</th>
                                ';
                            } else {
                                echo '
                                    <th scope="col">Резервация №</th>
                                    <th scope="col">Стая №</th>
                                    <th scope="col">Тип на стаята</th>
                                    <th scope="col">От дата</th>
                                    <th scope="col">До дата</th>
                                ';
                            }
                            ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while($reservation = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <?php 
                                if(isAdmin()) {
                                    echo '
                                        <th scope="row">'.$reservation["reservationid"].'</th>
                                        <td>'.$reservation["firstname"].'</td>
                                        <td>'.$reservation["lastname"].'</td>
                                        <td>'.$reservation["roomnumber"].'</td>
                                        <td>'.$reservation["roomtype"].'</td>
                                        <td>'.date('d.m.Y', strtotime($reservation["fromdate"])).'</td>
                                        <td>'.date('d.m.Y', strtotime($reservation["todate"])).'</td>
                                    ';
                                } else {
                                    echo '
                                        <th scope="row">'.$reservation["reservationid"].'</th>
                                        <td>'.$reservation["roomnumber"].'</td>
                                        <td>'.$reservation["roomtype"].'</td>
                                        <td>'.date('d.m.Y', strtotime($reservation["fromdate"])).'</td>
                                        <td>'.date('d.m.Y', strtotime($reservation["todate"])).'</td>
                                    ';      
                                } 
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include "layout/footer.php" ?>