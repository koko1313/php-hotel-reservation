<?php include "layout/header.php" ?>
    <?php redirectIfNotLogged() ?>

    <?php 
        if(isset($_POST['create'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            $db->query("UPDATE `user` 
                SET 
                firstname = '". $firstname ."', 
                lastname = '". $lastname ."', 
                email = '". $email ."', 
                phone = '". $phone ."'
                WHERE id = '". $_SESSION["user"]["id"]."'"); 

            // Duplicate value
            if($db->errno == 1062) {
                setMessage("dangerMessage", "Вече има регистриран потребител с този email");
            } else {
                $result = $db->query("SELECT * FROM userview WHERE id = '". $_SESSION["user"]["id"]."'");
                $user = mysqli_fetch_array($result);
                $_SESSION ["user"] = $user;
                setMessageAndRedirect("successMessage", "Успешна промяна", "user-profile.php");
            }
        }
    ?>

    <div class="container main-content">
        <div class="row">
            <div class="col-md-3">
                <img src="http://via.placeholder.com/300x250" class="img-rounded img-fluid"/>
            </div>
            <div class="col-md">
                <form method="POST" onKeyUp="validateForm(this)" onChange="validateForm(this)">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Име</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="firstname" 
                            name="firstname" 
                            value="<?php echo $_SESSION["user"]["firstname"] ?>" 
                            required
                        />
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Фамилия</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="lastname" 
                            name="lastname" 
                            value="<?php echo $_SESSION["user"]["lastname"] ?>" 
                            required
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
                            required
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
                            required
                        />
                    </div>
                    
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" name="create" class="btn btn-primary">Запази промените</button>
                    </div>
                </form>
            </div>          
        </div>   
    </div>
<?php include "layout/footer.php" ?>