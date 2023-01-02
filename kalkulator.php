<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator wynajmu studia</title>
    <link rel="stylesheet" href="styleKalkulator.css">
    <link rel="icon" type="image/x-icon" href="favicon2.webp">
</head>
<body>
    <?php include("header.php");?>


    <div class="title-container">
        <center><h1>Kalkulator wynajmu studia</h1></center>
    </div>

    <section class="p-5">
        <div class="container">
            <div class="form-container">
                <form id="form" method="post">
                  <h3>Sprawdź koszt wynajęcia studia</h3>
                  <p>* cena wynajmu studia wynosi: </p>
                  <p>od 1h-2h cena wynosi za godzinę 250zł </p>
                  <p>od 3h-4h cena wynosi za godzinę 200zł </p>
                  <p>od 5h-8h cena wynosi za godzinę 150zł </p>
                  <div class="select-container">
                    <select name="hoursFrom" id="select1">
                      <option value="16:00" selected>16:00</option>
                      <option value="17:00">17:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                      <option value="24:00">24:00</option>
                    </select>
                    <select name="hoursTo" id="select2">
                      <option value="17:00" selected>17:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                      <option value="24:00">24:00</option>
                    </select>
                  </div>  
                  <br><input id="sprawdz" type="submit" name="submit" value="Sprawdź"/>
                </form>

                <?php 
                    if(isset($_POST['submit'])){
                      $hoursFrom = $_POST['hoursFrom'];
                      $hoursTo = $_POST['hoursTo'];

                      $result = $hoursTo - $hoursFrom;

                      if ($result < 1) {
                        echo '<center><p style="margin-top: 15px">Podałeś złe dane do obliczenia!</p></center>';
                      }
                      else if ($result >= 1 && $result < 3) {
                        $cena1 = $result * 250; 
                        echo '<center><p style="margin-top: 15px">Cena wynosi ' .$cena1. ' zł!</p></center>';
                      }
                      else if ($result >= 3 && $result < 5) {
                        $cena2 = $result * 200; 
                        echo '<center><p style="margin-top: 15px">Cena wynosi ' .$cena2. ' zł!</p></center>';
                      }
                      else if ($result >= 5 && $result <= 8) {
                        $cena3 = $result * 150; 
                        echo '<center><p style="margin-top: 15px">Cena wynosi ' .$cena3. ' zł!</p></center>';
                      }
                                                               
                    }
                ?>

            </div>
            <div class="slide-container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="imgStudio.jpg" class="d-block w-100" alt="..." style="width: 400px;">
                      </div>
                      <div class="carousel-item">
                        <img src="imgStudio.jpg" class="d-block w-100" alt="..." style="width: 400px;">
                      </div>
                      <div class="carousel-item">
                        <img src="imgStudio.jpg" class="d-block w-100" alt="..." style="width: 400px;">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </section>
    
</body>
</html>