<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_GET["nome"])) {
        die("Errore! manca un parametro essenziale per il caricamento dello stand!");
    } else {
        $stand_name = $_GET["nome"];
        require("../data/connessione_db.php");
        $sql = "SELECT nome 
                FROM stand
                WHERE nome = '$stand_name'";
        $ris = $conn->query($sql) or die("<p>Query fallita!".$conn->error."</p>");
        if ($ris->num_rows == 0) {
            // decidere che cosa fare
            die ("Stand non trovato!");
        } else {
            $riga = $ris->fetch_assoc();
            $stand_name = $riga['nome'];
            $stand_user = $riga['nome'];
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stands: Jojo's Bizzare Adventures</title>
    <link rel="stylesheet" href="..\css\stand_ricerca_style.css">
</head>

<body>
    <div class="page_container">

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
                <div class="category_text"><p>Stands</p></div>
            </div>
        </header>


        <img src="" alt="">
        <main>
            <?php
                $stand_name_apostrofo = str_replace("*","'",$stand_name);
                $stand_name_lowercase = strtolower($stand_name_apostrofo);
                $stand_name_lowercase = str_replace(" ", "_", $stand_name_lowercase);
                $stand_name_lowercase = str_replace("'", "", $stand_name_lowercase);

                echo "<h1><a href='#'>$stand_name_apostrofo</a></h1>";

                echo <<<EOD
                    <div id="tv">
                        <div id="tv__img">
                            <img src="../immagini/tv.webp" alt="" class="television">
                            <img src="../immagini/video_$stand_name_lowercase.gif" class="gif">
                        </div>
                    </div>
                EOD;

                
                echo "<img src='../immagini/stand_img_$stand_name_lowercase.png' class='f_r'>";
                echo "<img src='../immagini/user_img_$stand_name_lowercase.png' class='f_l'>";

                
                $description_file = fopen("../data/stands_descriptions.txt", "r") or die("Unable to open file!");
                $descriptions = fread($description_file,filesize("../data/stands_descriptions.txt"));
                fclose($description_file);

                $descriptions = explode("+", $descriptions);

                foreach ($descriptions as $d){
                    if (str_contains($d, $stand_name_apostrofo)){
                        echo "<p>$d</p>";
                        break;
                    }
                }
            ?>

        </main>

        <div class="gototop"><img src="../immagini/gototop_shadow.png" alt=""></div>

        <footer>
            <p>Authors | F. Banani, L. Sambo</p>
        </footer>

<body>
