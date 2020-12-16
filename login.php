<?php include "layout/header.php" ?>

    <?php redirectIfLogged() ?>

    <?php 
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $result = $db->query("SELECT * FROM userview WHERE email='". $email ."' AND password='". $password ."'");
            $user = mysqli_fetch_array($result);
            if($user){
                $_SESSION ["user"] = $user;
                header("Location: index.php"); 
                exit();
            } else { ?>
                <div class="alert alert-danger fade show" role="alert">
                    <strong>Грешни данни!</strong> Моля опитайте да въведете данните отново.
                </div>
    <?php 
            }
        }
    ?>
    
    <div>
        <form method="post">
            <div class="container main-content">
                <div class="row">
                    <div class="col-md">
                        <h1>Вход</h1>
                        <p>Попълнете внимателно формата за вход</p>
                        <hr class="mb-3"> 
                        
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="name@example.com" required>
                            <label for="email">Имейл</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="pass123" required>
                            <label for="password">Парола</label>
                        </div>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="login" value="Влез">
                    </div>
                    <div class="col-md-3 col text-center">
                        <h1>Нямате акаунт?</h1>
                        <p>Цъкнете бутона за да направите вашата регистрация!</p>
                        <a href="registration.php" class="btn btn-primary float-right" role="button">Регистрирай се!</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php include "layout/footer.php" ?>