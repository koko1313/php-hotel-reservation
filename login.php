<?php include "layout/header.php" ?>
<?php 
        $current_page = "login";
        include "layout/menu.php";
    ?>
<?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $result = $db->query("SELECT * FROM client WHERE email='". $email ."' AND password='". $password ."'");
        $user = mysqli_fetch_array($result);
        if($user){
            $_SESSION ["user"] = $user;
            header("Location: index.php"); 
            exit();
        } else { ?>
            <div class="alert alert-danger fade show" role="alert">
  <strong>Грешни данни!</strong> Моля опитайте да въведете данните отново.
  </button>
</div>
       <?php }
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
                    <input class="btn btn-primary" type="submit" name="login" value="Влез">
                </div>
                <div class="col-sm-3 col text-center">
                    <h1>Нямате акаунт?</h1>
                    <p>Цъкнете бутона за да направите вашата регистрация!</p>
                    <a href="registration.php" class="btn btn-primary float-right" role="button">Регистрирай се!</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "layout/footer.php" ?>