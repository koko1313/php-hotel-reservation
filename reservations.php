<?php include "layout/header.php" ?>

    <h1>Резервации</h1>

    <?php
        $results = $db->query("SELECT * FROM roomtype");
    ?>

    <form method="post">
        Име: <input name="first_name" type="text" /> <br/>
        Фамилия: <input name="last_name" type="text" /> <br/>
        Телефон: <input name="phone" type="number"/> <br/>
        E-mail: <input name="email" type="email"/> <br/>
        Предпочитан тип стая: 
            <select name="prefered_room_type">
                <?php
                    while($roomtype = mysqli_fetch_array($results)) {
                        echo "<option value='". $roomtype["id"] ."'>". $roomtype["roomtype"] ."</option>";
                    }
                ?>
            </select>
            <br/>
        Предпочитан брой легла: <input name="prefered_bed_count" type="numer"/> <br/>
        <button name="reservation">Резервирай</button>
    </form>

    <?php 
        if(isset($_POST["reservation"])) {
            $db->query("INSERT INTO client (
                firstname, 
                lastname, 
                phone, 
                email, 
                preferredroombedcount, 
                preferredroomtypeid
            ) VALUES (
                '". $_POST["first_name"] ."', 
                '". $_POST["last_name"] ."', 
                '". $_POST["phone"] ."', 
                '". $_POST["email"] ."', 
                '". $_POST["prefered_bed_count"] ."', 
                '". $_POST["prefered_room_type"] .
            "')");

            echo $test;
        }
    ?>

<?php include "layout/footer.php" ?>