<?php
session_start();
if(isset($_POST['email']))
    {
        $danem = false;
        $email = trim($_POST['email']);
        $sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
        if(preg_match($sprawdz, $email))
        {
            $dane_poprawne = true;
        }   
        else
        {
            $dane_poprawne = false;
            $_SESSION['b_email'] = '<p class = "errortext"> Adres email nieprawidłowy</p>';
        
        
        }
            



        

    }
if(isset($_POST['name']))
    {
        $imie = trim($_POST['name']);
    }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adrwlo-store</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="favicon2.webp">
    <link rel="stylesheet" href="style.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    
<section class="pb-5" id="nav2">
        <nav id="nav" class="navbar fixed-top navbar-expand-lg bg-white text-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand"><img src="newLogoCanva.png" width="60%" height="auto"></a>

                <button id="hamburgermenu" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
              </button>


                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#sklep" class="nav-link">sklep</a>
                        </li>
                        <li class="nav-item">
                            <a href="#studio" class="nav-link">studio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#kontakt" class="nav-link">kontakt</a>
                        </li>
                        <li class="nav-item">
                          <a href="logowanie.php" class="nav-link">logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">koszyk <span style="font-size: 12px;">(0)</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </section>


    <section class="p-5" id="elo">
      <div class="container p-5 text-center" style="background-image: url(background.jpg)">
        <span class="font-weight-bold" style="color: #8DBC76; font-size: 40px">Home page </span>
        <span class="text-success font-weight-bold" id="timer"></span>
      </div>
    </section>


    <section id="sklep" class="p-5">

      <div class="d-flex justify-content-center flex-wrap">

        <div class="card1" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" id="card1-img-top" src="imagesPrzedmioty/t-shirt.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">T-shirt adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn">79.99 pln</a>
          </div>
        </div>

        <div class="card" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" src="imagesPrzedmioty/bluza2.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">Bluza adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn">179.99 pln</a>
          </div>
        </div>

        <div class="card" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" src="imagesPrzedmioty/bluza.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">Bluza adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn">179.99 pln</a>
          </div>
        </div>

        <div class="card" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" src="imagesPrzedmioty/t-shirt2.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">T-shirt adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn">79.99 pln</a>
          </div>
        </div>

        <div class="card" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" src="imagesPrzedmioty/bluza3.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">Hoodie adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn" >229.99 pln</a>
          </div>
        </div>

        <div class="card" style="width: 22rem; padding: 20px; margin-left: 30px; margin-right: 30px; margin-bottom: 40px;">
          <img class="card-img-top" src="imagesPrzedmioty/bluza4.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title font-weight-bold">Hoodie adrwlo-store</h5>
            <a href="#" id="priceBtn" class="btn">229.99 pln</a>
          </div>
        </div>
    
      </div>
    </section>

  <section class="pt-5" id="kontakt">

  <div class="container-fluid py-5 album" style="background-image: url(background.jpg)">
    <div class="container marketing">
  
      <div class="row featurette">
        <div class="col-md-7 order-md-2 text-center">
          <h2 class="featurette-heading fw-normal lh-1 text-white pb-3">Masz jakieś pytania?<span style="color: #7ca567; font-weight: bold"> Napisz do nas!</span></h2>
          <p class="lead text-white fw-light lh-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus praesentium
            labore accusamus sequi, voluptate debitis tenetur in deleniti possimus modi voluptatum
            neque maiores dolorem unde? Aut dolorum quod excepturi fugit.

          </p>
        </div>
        <div class="col-md-5 order-md-1 mt-xs-5">
          <div class="container w-100 bg-white align-items-center p-3 rounded text-dark border border-light">
            <form id="formContatct" method="post" action="wysylkaformularz.php" style="background: white;">
                <div class="mb-3">
                  <label for="iin" class="form-label">Imię i nazwisko</label>
                  <input type="text" class="form-control bg-white" id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">E-mail</label>
                  <input type="email" class="form-control input-border-color: #8DBC76" name="email" id="email">
                  <?php
                      if(isset($_SESSION['b_email'])) 
                      {
                        echo $_SESSION['b_email'];
                        unset ($_SESSION['b_email']);
                      }
                  ?>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="wiadomosc" name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label class="text-secondary" for="floatingTextarea2">Twoja wiadomość</label>
                  </div>
        
                <center><button type="submit" class="btn" id="sendForm">Wyślij</button></center>
              </form>
        
        
        </div>  
        </div>
      </div>
    </div>
  </div>

  </section>

    <section class="pt-5">
      <div class="container" id="studio">
          <!-- Jumbotron -->
        <a href="kalkulator.php" style="text-decoration: none;"><div 
          class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white img-fluid"
          
        >
          <h1 class="mb-3 h2">Szukasz studia?</h1>

          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus praesentium
            labore accusamus sequi, voluptate debitis tenetur in deleniti possimus modi voluptatum
            neque maiores dolorem unde? Aut dolorum quod excepturi fugit.
          </p>
        </div></a>
        <!-- Jumbotron -->
        </div>
    
    </section>


    <footer class="container p-5 d-flex" style="background-image: url(background.jpg)">
        <div id="footer-container" class="container text-center">
          <a class="" href="#2">regulamin</a>
          <a class="" href="#3">polityka prywatności</a>
          <a class="" href="#4">dostawa i płatność</a>
          <a class="" href="#5">kontakt</a>
        </div>
        <div class="kotwica-container">
          <a href="#nav2"><button id="kotwica"><img src="arrow-142-24.png" alt=""></button></a>
        </div>
    </footer>
     
    <script src="script5.js"></script>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"
  ></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
</body>
</html>