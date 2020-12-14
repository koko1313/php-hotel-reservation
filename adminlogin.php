<?php $current_page = "adminlogin" ?>

<?php include "layout/header.php" ?>

    <?php redirectIfLogged() ?>

    <?php 
        if(isset($_POST['admin'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $result = $db->query("SELECT * FROM adminlogin WHERE username='". $username ."' AND password='". $password ."'");
            $admin = mysqli_fetch_array($result);
            if($admin){
                $_SESSION ["admin"] = $admin;
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
                            <input class="form-control" type="text" name="username" id="username" placeholder="username" required>
                            <label for="username">Потребителско име</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="pass123" required>
                            <label for="password">Парола</label>
                        </div>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="admin" value="Влез">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php include "layout/footer.php" ?>