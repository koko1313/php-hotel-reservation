<?php include "layout/header.php" ?>
<?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $result = $db->query("SELECT * FROM client WHERE email='". $email ."' AND password='". $password ."'");
        $user = mysqli_fetch_array($result);
        $_SESSION ["user"] = $user;
    }

?>
<div>
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Вход</h1>
                    <p>Попълнете внимателно формата за вход</p>
                    <hr class="mb-3"> 
                    
                    <label for="email"><b>Имейл</b></label>
                    <input class="form-control" type="email" name="email" required>
                
                    <label for="password"><b>Парола</b></label>
                    <input class="form-control" type="password" name="password" required> 
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="login" value="Log In">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "layout/footer.php" ?>