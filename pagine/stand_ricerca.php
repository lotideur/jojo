<!DOCTYPE html>
<html lang="en">

<?php
    $search_input_stand_name = "";
?>

<?php
    if (!isset($_GET["nome"])) {
        die("Errore! manca un parametro essenziale per il caricamento dello stand!");
    } else {
        $stand_name = $_GET["nome"];
        require("../data/connessione_db.php");
        $sql = "SELECT nome 
                FROM stand
                WHERE nome = '$stand_name'";
        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
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
    <link rel="stylesheet" href="..\css\stands_style.css">
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

                <div id="home_button"><a href="../index.html"><img src="../immagini/home.png" alt=""></a></div>
            </div>

            <div class="nav_stripe">
                <div class="category_text"><p>Stands</p></div>
                <!-- <div class="category_text"><p> > </p></div> -->
                <!-- <div class="nav_button"><a><p>Jojo</p></a></div> -->
                <!-- <div class="nav_button"><a><p>Trama</p></a></div> -->
                <!-- <div class="nav_button"><a><p>Autore</p></a></div> -->
                <!-- <div class="nav_button"><a><p>Guarda</p></a></div> -->
                <!-- <div class="nav_button"><a><p>Parti</p></a></div> -->
                <!-- <div class="donate_button"><a href="https://web.spaggiari.eu/home/app/default/login.php"><p>Dona</p><img src="../immagini/heart.png" alt=""></a></div> -->
            </div>
        </header>

        <main>
            <img src="" alt="">
            <div id="pb_banner">
                <div id="pb_banner__left">
                    <?php 
                        $stand_name_lc = strtolower($stand_name);
                        $stand_name_lc = str_replace(" ", "_", $stand_name_lc);
                        echo <<<EOD
                            <div>
                                <img src='../immagini/stand_img_$stand_name_lc.png' alt=''>                
                            </div>
                        EOD;
                    ?>
                    <img src="../immagini/fade_h.png" alt="">
                </div>
                <div id="pb_banner__right">
                    <!-- <img src="../immagini/pb_logo.png" alt=""> -->
                    <h2>
                        <?php
                            echo $stand_name;
                        ?>
                    </h2>
                </div>
            </div>

            <div id="other_title">
                <img src="../immagini/logo_english.png" alt="">
                <h2><?php echo $stand_name; ?></h2>
            </div>

            <div id="plot">
                <h2>
                    <?php
                        $myfile = fopen("../testi/stand_$stand_name_lc.txt", "r") or die("Unable to open file!");
                        echo fread($myfile,filesize("../testi/stand_$stand_name_lc.txt"));
                        fclose($myfile);
                    ?>
                </h2>
                
                <p>
                    <?php
                        $myfile = fopen("../testi/user_$stand_name_lc.txt", "r") or die("Unable to open file!");
                        echo fread($myfile,filesize("../testi/user_$stand_name_lc.txt"));
                        fclose($myfile);
                    ?>
                </p>
                <!-- <p>Generalmente si presenta come una figura sospesa sopra o vicino all'utilizzatore e possiede abilità superiori a quelle di un normale essere umano.</p> -->
            </div>

            <div id="search_engine">
                <div>
                    <?php 
                        echo <<<EOD
                            <div>
                                <img src='../immagini/user_img_$stand_name_lc.png' alt=''>                
                            </div>
                        EOD;
                    ?>
                </div>
                <div>
                    <?php 
                        echo <<<EOD
                            <div>
                                <img src='../immagini/video_$stand_name_lc.gif' alt=''>                
                            </div>
                        EOD;
                    ?>
                </div>
            </div>

        </main>

        <div class="gototop"><img src="../immagini/gototop_shadow.png" alt=""></div>

        <footer>
            <p>Authors | F. Banani, L. Sambo</p>
        </footer>
