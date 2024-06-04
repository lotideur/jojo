<?php
    session_start();
    if (isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }else{
        header("Location: ../index.php");
    }

    if (isset($_GET["dati_modificati"])){
        $password = $_POST["password"];
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $email = $_POST["email"];

        require("../data/connessione_db.php");
        $sql = "SELECT password, nome, cognome, email
                FROM user WHERE user.username = '$username'";
        $ris = $conn->query($sql)->fetch_assoc() or die("<p>Query fallita".$conn->error."</p>");
        if (!($password == $ris["password"] AND $nome == $ris["nome"] AND $cognome == $ris["cognome"] AND $email == $ris["email"])){
            $sql2 = "UPDATE user
                    SET password = '$password',
                        nome = '$nome',
                        cognome = '$cognome',
                        email = '$email'
                    WHERE user.username = '$username'";
            $conn->query($sql2) or die("<p>Query fallita".$conn->error."</p>");
            header("Location: ?dati_modificati_salvati=");
        }
    }

    if (isset($_GET["categoria"])){
        $categoria=$_GET["categoria"];
    }else{
        $categoria="dati_personali";
        // $_GET["categoria"] = "dati_personali";
        // if (!isset($_GET["dati_modificati_salvati"])){
        //     header("Location: ?categoria=dati_personali");
        // }else{
        //     header("Location: ?categoria=dati_personali&dati_modificati_salvati=");
        // }
    }

    if ($categoria=="dati_personali"){
        require("../data/connessione_db.php");
        $sql = "SELECT password, nome, cognome, email
                FROM user
                WHERE user.username = '$username'";
        $ris = $conn->query($sql) or die("<p>Query fallita".$conn->error."</p>");
        $ris = $ris->fetch_assoc();
        
        $password = $ris["password"];
        $nome = $ris["nome"];
        $cognome = $ris["cognome"];
        $email = $ris["email"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profilo_style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="white_stripe">
            <div class="logo">
                <img src="../immagini/logo_english.png" alt="">
            </div>
            
            <p>ジョジョの奇妙な冒険</p>
            
            <div class="logo">
                <img src="../immagini/logo.png" alt="">
            </div>
            
            <div id="home_button"><a href="../index.php"><img src="../immagini/home.png" alt=""></a></div>
        </div>

        <div class="nav_stripe">
            <div class="category_text">
                <p>Categorie</p>
            </div>
            <div class="category_text">
                <p> > </p>
            </div>

            <?php
                $categorie = ["Dati personali", "Stand preferiti", "Logout", "Risultati quiz", "Classifica"];

                foreach ($categorie as $c){
                    $c_lower = str_replace(" ", "_", strtolower($c));
                    
                    if ($c_lower == $categoria){
                        $class="nav_button--active";
                    }else{
                        $class="nav_button";
                    }

                    echo <<<EOD
                        <div class=$class><a href="?categoria=$c_lower">
                            <p>$c</p>
                        </a></div>
                    EOD;
                }
            ?>
            <div class="donate_button"><a href="https://web.spaggiari.eu/home/app/default/login.php">
                    <p>Dona</p><img src="../immagini/heart.png" alt="">
            </a></div>
        </div>
    </header>

    <main>
        <?php

            if ($categoria == "dati_personali"){
                require("profilo_dati_personali.php");
            }
            
        ?>
    </main>

    <footer>
        <p>Authors | F. Banani, L. Sambo</p>
    </footer>
    
</body>

</html>