<?php include "layout/header.php" ?>

    <h1>Резервации</h1>

    <?php
        $results = $db->query("SELECT * FROM roomtype");
    ?>

    <?php if(!isset($_POST["find_rooms"])) { ?>
        <form method="POST">
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
            <button name="find_rooms">Намери стая</button> <br/>
        </form>
    <?php } else { ?>
        <?php 
            $_SESSION["first_name"] = $_POST["first_name"];
            $_SESSION["last_name"] = $_POST["last_name"];
            $_SESSION["phone"] = $_POST["phone"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["prefered_room_type"] = $_POST["prefered_room_type"];
            $_SESSION["prefered_bed_count"] = $_POST["prefered_bed_count"];
        ?>

        Име: <?php echo $_SESSION["first_name"] ?> <br/>
        Фамилия: <?php echo $_SESSION["last_name"] ?> <br/>
        Телефон: <?php echo $_SESSION["phone"] ?> <br/>
        E-mail: <?php echo $_SESSION["email"] ?> <br/>
        Предпочитан тип стая: <?php echo $_SESSION["prefered_room_type"] ?> <br/>
        Предпочитан брой легла: <?php echo  $_SESSION["prefered_bed_count"] ?> <br/>

        <form method="POST">
            <?php 
                $results = $db->query("
                    SELECT 
                        * 
                    FROM roomview 
                    WHERE 
                        roomtypeid='". $_POST["prefered_room_type"] ."'
                    AND
                        bednumber='". $_POST["prefered_bed_count"] ."'
                ");
            ?>

            <h3>Избери стая</h3>

            <?php 
                if(mysqli_num_rows($results) == 0) {
                    echo "Няма намерени стаи.";
                } else {
                    while($room = mysqli_fetch_array($results)) {
                        echo "<input type='radio' name='choosen_room' value='". $room["roomid"] ."'>". $room["roomnumber"] ."</input> <br/>";
                    }
                }
            ?>

            <button name="reservation">Резервирай</button>
        </form>
    <?php } ?>

    <?php 
        if(isset($_POST["reservation"])) {
            $db->query("
                INSERT INTO client (
                    firstname, 
                    lastname, 
                    phone, 
                    email, 
                    preferredroombedcount, 
                    preferredroomtypeid
                ) VALUES (
                    '". $_SESSION["first_name"] ."', 
                    '". $_SESSION["last_name"] ."', 
                    '". $_SESSION["phone"] ."', 
                    '". $_SESSION["email"] ."', 
                    '". $_SESSION["prefered_bed_count"] ."', 
                    '". $_SESSION["prefered_room_type"] .
                "')
            ");

            $client_id =  $db->insert_id;

            $db->query("
                INSERT INTO reservation (
                    clientid,
                    roomid
                ) VALUES (
                    '". $client_id ."',
                    '". $_POST["choosen_room"] ."'
                )
            ");
        }
    ?>

<?php include "layout/footer.php" ?>