<?php include "layout/header.php" ?>

    <div class="container main-content">
        <div class="row">
            <h1>Резервации</h1>

            <?php
                $results = $db->query("SELECT * FROM roomtype");
            ?>

            <?php if(!isset($_POST["find_rooms"])) { ?>
                <form method="POST">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Име</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"/>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"/>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="number" class="form-control" id="phone" name="phone"/>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="prefered_room_type" class="form-label">Предпочитан тип стая</label>
                        <select id="prefered_room_type" name="prefered_room_type" class="form-control">
                            <option value="null">Избери тип стая</option>
                            <?php
                                while($roomtype = mysqli_fetch_array($results)) {
                                    echo "<option value='". $roomtype["id"] ."'>". $roomtype["roomtype"] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prefered_bed_count" class="form-label">Предпочитан брой легла</label>
                        <input type="number" class="form-control" id="prefered_bed_count" name="prefered_bed_count"/>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button name="find_rooms" class="btn btn-primary">Намери стая</button>
                    </div>
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

                <div class="col">
                    <h3>Лични данни</h3>
                    Име: <?php echo $_SESSION["first_name"] ?> <br/>
                    Фамилия: <?php echo $_SESSION["last_name"] ?> <br/>
                    Телефон: <?php echo $_SESSION["phone"] ?> <br/>
                    E-mail: <?php echo $_SESSION["email"] ?> <br/>
                    Предпочитан тип стая: <?php echo $_SESSION["prefered_room_type"] ?> <br/>
                    Предпочитан брой легла: <?php echo  $_SESSION["prefered_bed_count"] ?>
                </div>

                <div class="col">
                    <form method="POST">
                        <?php 
                            $results = $db->query("
                                SELECT 
                                    * 
                                FROM roomview 
                                WHERE 
                                    roomtypeid='". $_POST["prefered_room_type"] ."'
                                AND
                                    bedcount='". $_POST["prefered_bed_count"] ."'
                            ");
                        ?>

                        <h3>Избери стая</h3>

                        <?php 
                            if(mysqli_num_rows($results) == 0) {
                                echo "<p>Няма намерени стаи.</p>";
                            } else {
                                while($room = mysqli_fetch_array($results)) {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="choosen_room" id="choosen_room">
                                <label class="form-check-label" for="choosen_room">
                                    <?php echo $room["roomnumber"] ?>
                                </label>
                            </div>
                        <?php
                                }
                            }
                        ?>

                        <button name="reservation" class="btn btn-primary">Резервирай</button>
                    </form>
                </div>
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
        </div>
    </div>

<?php include "layout/footer.php" ?>