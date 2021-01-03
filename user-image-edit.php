<?php include "layout/header.php" ?>
    <?php redirectIfNotLogged() ?>

    <?php
        if(isset($_POST["upload_image"])) {
            $image = $_FILES["image"]["name"];

            $temp = explode(".", $_FILES["image"]["name"]);

            $newfilename = "profile-image-". $_SESSION["user"]["id"] . '.' . end($temp);
            
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], "picture/profile-images/" . $newfilename)) {
                setMessageAndRedirect("errorMessage", "Неуспешна промяна", "user-profile.php");
            }

            $db->query("UPDATE `user` SET image='". $newfilename ."' WHERE id = '". $_SESSION["user"]["id"] ."'");

            fetchUserSession();

            setMessageAndRedirect("successMessage", "Успешна промяна", "user-profile.php");
        }
    ?>

    <div class="container main-content">
        <div class="row">
            <div class="col-md">
                <form method="POST" onKeyUp="validateForm(this)" onChange="validateForm(this)" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="input-group">
                            <input 
                                type="file" 
                                class="form-control" 
                                id="image" 
                                name="image"
                                required
                            />
                            <button class="btn btn-outline-secondary" type="submit" name="upload_image">Качи снимка</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "layout/footer.php" ?>