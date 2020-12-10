<?php include "layout/header.php" ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="picture/backgroudn1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="display-1">
              <?php
              if (isset($_SESSION['user'])){
                echo 'Добре дошли, '.$_SESSION["user"]["firstname"];
              }else{
                echo 'Добре дошли';
              }
              ?>
            </h1>
            <p>Ще се насладите на вашата почивка, както никога до сега!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="picture/backgroudn2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="display-1">
              <?php
              if (isset($_SESSION['user'])){
                echo 'Добре дошли, '.$_SESSION["user"]["firstname"];
              }else{
                echo 'Добре дошли';
              }
              ?>
            </h1>
            <p>Ще се насладите на вашата почивка, както никога до сега!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="picture/backgroudn3.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="display-1">
              <?php
              if (isset($_SESSION['user'])){
                echo 'Добре дошли, '.$_SESSION["user"]["firstname"];
              }else{
                echo 'Добре дошли';
              }
              ?>
            </h1>
            <p>Ще се насладите на вашата почивка, както никога до сега!</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
  </div>
  <div class="container main-content">
    <div class="row">
      <div class="col text-center">
          <h1>Локация</h1>
          <p>Хотелът се намира в сърцето на града, на пешеходно разстояние от оживения център на града, изпълнен с емблематични исторически и културни забележителности, обширни зелени паркове и многобройни държавни институции. Ние говорим на вашия език!</p>
      </div>
      <div class="col text-center">
          <h1>Удобства</h1>
          <p>Хотелът разполага със СПА център, 5 ресторанта, фитнес център, барове и общи салони. Хотелът предлага денонощна рецепция, хеликоптерна площадка, конгресен център, рум-сървиз и билетни услуги за гостите.</p>
          <a href="reservations.php" class="btn btn-primary text-center" role="button">Резервирай</a>
      </div>
      <div class="col text-center">
          <h1>СПА</h1>
          <p>СПА и уелнес център Millennium предлага панорамен плувен басейн, хидромасажни вани, финландска баня с панорамен изглед, ароматна и инфрачервена сауна, морска парна баня със сол, ориенталска турска баня, хималайска солна стая, стая за релакс с водни легла и зона за тайландски масаж.</p>
      </div>
    </div>
  </div>
  <div>
    <h1 class="display-2 text-center">Открий ни тук!</h1>
  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2909.6869816507115!2d27.925841376425826!3d43.17409426171575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle%20maps!5e0!3m2!1sen!2sbg!4v1607610982608!5m2!1sen!2sbg" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  
<?php include "layout/footer.php" ?>