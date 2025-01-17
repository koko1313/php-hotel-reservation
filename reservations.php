<?php include "layout/header.php" ?>

    <?php 
        redirectIfNotLogged();
        redirectIfAdmin();
    ?>

    <div class="container main-content">
        <div class="row">
            <h1>Резервации</h1>

            <?php
                $results = $db->query("SELECT * FROM roomtype");
            ?>

            <?php if(!isset($_POST["find_rooms"])) { ?>
                <form method="POST" onKeyUp="validateForm(this)" onChange="validateForm(this)">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Име</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="first_name" 
                            name="first_name" 
                            value="<?php echo $_SESSION["user"]["firstname"] ?>" 
                            disabled
                        />
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="last_name" 
                            name="last_name" 
                            value="<?php echo $_SESSION["user"]["lastname"] ?>" 
                            disabled
                        />
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="phone" 
                            name="phone" 
                            value="<?php echo $_SESSION["user"]["phone"] ?>" 
                            disabled
                        />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            value="<?php echo $_SESSION["user"]["email"] ?>" 
                            disabled
                        />
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="fromdate" class="form-label">От дата</label>
                            <input type="date" class="form-control" id="fromdate" name="fromdate" required/>
                        </div>
                        <div class="mb-3 col-md">
                            <label for="todate" class="form-label">До дата</label>
                            <input type="date" class="form-control" id="todate" name="todate" required/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="prefered_room_type" class="form-label">Предпочитан тип стая</label>
                        <select id="prefered_room_type" name="prefered_room_type" class="form-control" required>
                            <option value="">Избери тип стая</option>
                            <?php
                                while($roomtype = mysqli_fetch_array($results)) {
                                    echo "<option value='". $roomtype["id"] ."'>". $roomtype["roomtype"] ."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="prefered_bed_count" class="form-label">Предпочитан брой легла</label>
                        <input type="number" class="form-control" id="prefered_bed_count" name="prefered_bed_count" required/>
                    </div>

                    <div class="mb-3 d-flex justify-content-end">
                        <button name="find_rooms" type="submit" class="btn btn-primary" disabled>Намери стая</button>
                    </div>
                </form>
            <?php } else { ?>
                <?php 
                    $roomEntry = $db->query("SELECT * FROM roomview WHERE roomtypeid = '". $_POST["prefered_room_type"] ."'");
                    $room = mysqli_fetch_array($roomEntry);
                ?>
                <div class="col-md">
                    <h3>Лични данни</h3>
                    Име: <?php echo $_SESSION["user"]["firstname"] ?> <br/>
                    Фамилия: <?php echo $_SESSION["user"]["lastname"] ?> <br/>
                    Телефон: <?php echo $_SESSION["user"]["phone"] ?> <br/>
                    E-mail: <?php echo $_SESSION["user"]["email"] ?> <br/>
                    Предпочитан тип стая: <?php echo $room["roomtype"] ?> <br/>
                    Предпочитан брой легла: <?php echo  $_POST["prefered_bed_count"] ?>
                </div>

                <div class="col-md">
                    <form method="POST" onChange="validateForm(this)">
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
                                <input class="form-check-input" type="radio" name="choosen_room" id="choosen_room" value="<?php echo $room["roomid"] ?>">
                                <label class="form-check-label" for="choosen_room">
                                    <?php echo $room["roomnumber"] ?>
                                </label>
                            </div>
                        <?php
                                }
                            }
                        ?>

                        <!-- hidded fields for the date -->
                        <input type="hidden" class="form-control" id="fromdate" name="fromdate" value="<?php echo $_POST["fromdate"] ?>"/>
                        <input type="hidden" class="form-control" id="todate" name="todate" value="<?php echo $_POST["todate"] ?>"/>

                        <button name="reservation" type="submit" class="btn btn-primary" disabled>Резервирай</button>
                    </form>
                </div>
            <?php } ?>

            <?php 
                if(isset($_POST["reservation"])) {
                    if(isset($_POST["choosen_room"])) {
                        $db->query("
                            INSERT INTO reservation (
                                userid,
                                roomid,
                                fromdate,
                                todate
                            ) VALUES (
                                '". $_SESSION["user"]["id"] ."',
                                '". $_POST["choosen_room"] ."',
                                '". $_POST["fromdate"] ."',
                                '". $_POST["todate"] ."'
                            )
                        ");

                        setMessageAndRedirect("successMessage", "Успешно направена резервация", "my-reservations.php");
                    }
                }
            ?>
        </div>
    </div>

<?php include "layout/footer.php" ?>