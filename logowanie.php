<?php
require_once "connect.php";
        $polaczenie = @new mysqli ($host, $db_user, $db_password, $db_name);
        if ($polaczenie -> connect_errno!=0)
        {
            echo 'Error: '.$polaczenie -> connect_errno;
        }
        else
        {
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);


            $sql = "SELECT * FROM uzytkownicy WHERE user = '$login'";

            if ($rezultat = @$polaczenie -> query($sql))
            {
                $ilu_userow = $rezultat->num_rows;
                if ($ilu_userow>0)
                {
                    $wiersz = $rezultat -> fetch_assoc();
                    if (password_verify($haslo, $wiersz['pass']))
                    {
                    $user = $wiersz['user'];
                    $rezultat->free_result();
                    header('Location: poprawnelogowanie.php');
                    }

                else
                {
                    $dane_poprawne = false;
                    $_SESSION['b_haslo'] = '<center><p style="color: red";">Błędne dane logowania!</p></center>';
                   
                    
                }
            }
            }
            $polaczenie -> close();
            
        }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - adrwlo-store</title>
    <link rel="stylesheet" href="styleLogin.css">
    <link rel="icon" type="image/x-icon" href="favicon2.webp">
</head>

<body>

    <?php include("header.php"); ?>

    
    <div class="title-container">
        <h1>LOGOWANIE</h1>
    </div>

    <div class="login-container">
        <div class="form-container">
            <h2>Logowanie <span style="color: #8DBC76;">do konta</span></h2>
            <form action="logowanie.php" method="post">
                <br /><input type="text" name="login" placeholder="Login"><br />
                <br /><input type="password" name="haslo" placeholder="Password"><br />
                <br /><input id="bt" type="submit" value="Zaloguj się"><br /><br />
                <?php
                    if(isset($_SESSION['b_haslo']))
                    {
                        echo $_SESSION['b_haslo'];
                        unset ($_SESSION['b_haslo']);
                    }
                ?>
            </form>
        </div>
        <div class="second-container">
            <h1>Nie masz konta?</h1>
            <p>Rejestracja zajmie Ci tylko kilka minut!</p>
            <a href="rejestracja.php"><input id="registerButton" type=submit value="Utwórz nowe konto"></a>
        </div>
    </div>

    
    <script src="script.js"></script>
</body>
</html>