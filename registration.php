<?php include "layout/header.php" ?>
<?php 
    if(isset($_POST['create'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = md5($_POST['password']);
        
        
            $db->query("INSERT INTO client(
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
        
    }

?>
<div>
    <form action="registration.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Регистрация</h1>
                    <p>Попълнете внимателно формата за регистрация</p>
                    <hr class="mb-3">
                    <label for="firstname"><b>Име</b></label>
                    <input class="form-control" type="text" name="firstname" required>
                    
                    <label for="lastname"><b>Фамилия</b></label>
                    <input class="form-control" type="text" name="lastname" required>
                    
                    <label for="email"><b>Имейл</b></label>
                    <input class="form-control" type="email" name="email" required>
                    
                    <label for="phone"><b>Телефон</b></label>
                    <input class="form-control" type="number" name="phone" required>
                    
                    <label for="password"><b>Парола</b></label>
                    <input class="form-control" type="password" name="password" required> 
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Sign Up">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include "layout/footer.php" ?>