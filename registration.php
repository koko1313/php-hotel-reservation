<?php  $current_page = 'registration' ?>

<?php include "layout/header.php" ?>

    <?php redirectIfLogged() ?>

    <?php 
        if(isset($_POST['create'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = md5($_POST['password']);
            
            $db->query("INSERT INTO user(
                firstname, 
                lastname, 
                email, 
                phone, 
                password) 
                VALUES
                ('". $firstname ."', 
                '". $lastname ."', 
                '". $email ."', 
                '". $phone ."', 
                '". $password ."')"
            );

            // Duplicate value
            if($db->errno == 1062) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Вече има регистриран потребител с този email.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            } else {
                header("Location: login.php");
            }
        }

    ?>
    <div>
        <form action="registration.php" method="post">
            <div class="container main-content">
                <div class="row">
                    <div class="col">
                        <h1>Регистрация</h1>
                        <p>Попълнете внимателно формата за регистрация</p>
                        <hr class="mb-3">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="firstname" required>
                            <label for="firstname">Име</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="lastname" required>
                            <label for="lastname">Фамилия</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="name@example.com" required>
                            <label for="email">Имейл</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="phone" id="phone" placeholder="phone" required>
                            <label for="phone">Телефон</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="pass123" required>
                            <label for="password">Парола</label>
                        </div>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="create" value="Регистрирай се">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php include "layout/footer.php" ?>