<?php include "layout/header.php" ?>

    <?php redirectIfNotAdmin() ?>
            <?php
                $results = $db->query("SELECT * FROM roomtype");
            ?>
    <?php 
        if(isset($_POST['create'])){
            $roomnumber = $_POST['roomnumber'];
            $bedcount = $_POST['bedcount'];
            $roomtypeid = $_POST['roomtypeid'];
            $windowview = $_POST['windowview'];  
            
            $db->query("INSERT INTO room(
                roomnumber, 
                bedcount,
                roomtypeid, 
                windowview) 
                VALUES
                ('". $roomnumber ."', 
                '". $bedcount ."',
                '". $roomtypeid ."', 
                '". $windowview ."')"
            );

            // Duplicate value
            if($db->errno == 1062) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Вече има стая с този номер.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            } else {
                
            }
        }

    ?>
    <div>
        <form method="post" onKeyUp="validateForm(this)">
            <div class="container main-content">
                <div class="row">
                    <div class="col">
                        <h1>Добавяне на стаи</h1>
                        <hr class="mb-3">

                        <div class="mb-3">
                            <select id="roomtypeid" name="roomtypeid" class="form-control" required>
                            <option value="">Избери тип стая</option>
                            <?php
                                while($roomtype = mysqli_fetch_array($results)) {
                                    echo "<option value='". $roomtype["id"] ."'>". $roomtype["roomtype"] ."</option>";
                                }
                            ?>
                        </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="roomnumber" id="roomnumber" placeholder="roomnumber" required>
                            <label for="roomnumber">Номер на стаята</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="bedcount" id="bedcount" placeholder="bedcount" required>
                            <label for="bedcount">Брой на леглата</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="windowview" id="windowview" placeholder="windowview" required>
                            <label for="windowview">Гледка от прозореца</label>
                        </div>
                        
                        <hr class="mb-3">
                        <button class="btn btn-primary" type="submit" name="create" disabled>Добави стая</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php include "layout/footer.php" ?>