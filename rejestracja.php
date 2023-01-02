<?php
        session_start();

        if (isset($_POST['email']))
        {
            $dane_poprawne = true;
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslo1 = $_POST['haslo1'];

            $email = $_POST['email'];
            $findLetter = "@";
            $pos = strpos($email, $findLetter);

            $checkBox = $_POST['regulamin'];

            if(ctype_alnum($login)==false) 
            {
                $dane_poprawne = false;
                $_SESSION['e_login']='<p class="errorText">Błąd! Login powinien składać się ze znaków 
                alfanumerycznych.</p>';
            }
            if(($pos == false)) {
                $dane_poprawne = false;
                $_SESSION['e_mail']='<p class="errorText">Błąd! Adres e-mail nie zawiera znaku @.</p>';
            }
            
            if(strlen($haslo) < 8) 
            {
                $dane_poprawne = false;
                $_SESSION['e_haslo']='<p class="errorText">Błąd! Hasło powinno mieć przynajmniej 8 znaków!</p>';
            }
            if($haslo!=$haslo1)
            {
                $dane_poprawne = false;
                $_SESSION['e_haslo1']='<p class="errorText">Podane hasła muszą być identyczne.</p>';
            }
            if (!(isset($checkBox))) {
                $dane_poprawne = false;
                $_SESSION['e_checkBox']='<p class="errorText">Zaakceptuj regulamin!</p>';
            }

            //hashowanie hasla

            $haslo_hash = password_hash ($haslo, PASSWORD_DEFAULT);
        

             // połączenie z bazą
            
             // połączenie z bazą
            require_once "connect.php";
            try
            {
                $polaczenie=new mysqli($host, $db_user, $db_password, $db_name);

                if($polaczenie->connect_errno!=0)
                {
                    throw new Exception((mysqli_connect_errno()));
                }
                else
                {
                // sprawdzamy czy email istnieje już w bazie
                $rezulat=$polaczenie->query("SELECT id   FROM uzytkownicy WHERE email = '$email'");

                if(!$rezulat)
                {
                    throw new Exception($polaczenie->error);
                }

                $ile_wyszukanych_maili = $rezulat->num_rows;

                if(($ile_wyszukanych_maili)>0)
                {
                    $dane_poprawne = false;
                    $_SESSION['e_mail']='<p class="errortext">Istnieje już użytkownik o takim adresie e-mail</p>';
                }
                // udana walidacja
                if($dane_poprawne == true)
                {
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email')"))
                    {
                        // jeżeli się wykonało poprawine
                        $_SESSION['udanarejestracja'] = true;
                        header('Location: poprawnaRejestracja.php');
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                }

                $polaczenie->close();
                }
            }
                // złapanie wyjątków, przzechowujemy je w zmiennej $e
            catch(Exception $e)
            {
                    //jeżeli wyjątek złapany wyświetlamy info o błędie
                echo 'Błąd serwera. Przepraszamy za niedogodności, prosimy spróbować później';
                echo $e;
                    // zmienna $e wyświetli błędy
            }

        }

           
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - adrwlo-store</title>
    <link rel="icon" type="image/x-icon" href="favicon2.webp">
    <link rel="stylesheet" href="styleRegister.css">
</head>
<body>

    <?php include("header.php"); ?>

    <div class="title-container">
        <h1>REJESTRACJA</h1>
    </div>
    
    <div class="main-container">

        <div class="register-container">
            
            <form name="email" method="post">
                <br /><input type="text" name="login" placeholder="Login"><br />
                <?php
                    if(isset($_SESSION['e_login']))
                    {
                        echo $_SESSION['e_login'];
                        unset ($_SESSION['e_login']);
                    }
                ?>
                <br /><input type="text" name="email" placeholder="E-mail"><br />
                <?php
                    if(isset($_SESSION['e_mail']))
                    {
                        echo $_SESSION['e_mail'];
                        unset ($_SESSION['e_mail']);
                    }
                ?>
                <br /><input type="password" name="haslo" placeholder="Hasło"><br />
                <?php
                    if(isset($_SESSION['e_haslo']))
                    {
                        echo $_SESSION['e_haslo'];
                        unset ($_SESSION['e_haslo']);
                    }
                ?>
                <br /><input type="password" name="haslo1" placeholder="Powtórz hasło"><br />
                <?php
                    if(isset($_SESSION['e_haslo1']))
                    {
                        echo $_SESSION['e_haslo1'];
                        unset ($_SESSION['e_haslo1']);
                    }
                ?>
                <br />
                <input type="radio" id="mezczyzna" name="plec" checked>
                <label for="mezczyzna">Mezczyzna</label>
                <input type="radio" id="kobieta" name="plec">
                <label for="kobieta">Kobieta</label><br />
                <br />
                <div id="regulamin-accept">
                    <input type="checkbox" name="regulamin" class="check" id="regulamin">
                    <label for="regulamin">Zapoznałem się i akceptuję Regulamin świadczenia usług i politykę prywatności sklepu adr-wlo.pl</label><br/><br/>
                </div>
                <?php
                    if(isset($_SESSION['e_checkBox']))
                    {
                        echo $_SESSION['e_checkBox'];
                        unset ($_SESSION['e_checkBox']);
                    }
                ?>
                <input type="submit" name="button" class="bt" value="Zarejestruj konto">

            </form>

        </div>



    </div>
    
</body>
</html>

