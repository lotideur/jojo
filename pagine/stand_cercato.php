<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_GET["nome"])){
        header("Location: stands.php");
        // die("Errore! Manca un parametro essenziale per il caricamento dello stand!");
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

    session_start();
    if (isset($_SESSION["username"])) {$username = $_SESSION["username"];} else {$username = "";}

    if ($username){
        if (isset($_GET["add_to_favorites"])){
            $sql = "INSERT INTO preferiti (username, stand)
                    VALUES ('$username', '$stand_name')";
            $conn->query($sql) or die("<p>Query fallita!".$conn->error."</p>");

            $is_favorite = true;
            header("Location: ?nome=$stand_name");

        }elseif (isset($_GET["delete_from_favorites"])){
            $sql = "DELETE FROM preferiti
                    WHERE username = '$username' AND stand = '$stand_name'";
            $conn->query($sql) or die("<p>Query fallita!".$conn->error."</p>");

            $is_favorite = false;
            // header("Location: ?nome=$stand_name");
        }
        else{
            $sql = "SELECT username FROM preferiti WHERE username = '$username' AND stand = '$stand_name'";
            $ris = $conn->query($sql) or die("<p>Query fallita!".$conn->error."</p>");
            if ($ris->num_rows > 0){
                $is_favorite = true;
            }else{
                $is_favorite = false;
            }
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stands: Jojo's Bizzare Adventures</title>
    <link rel="stylesheet" href="..\css\stand_cercato_style.css">
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


        <main>
            <?php
                $stand_name_apostrofo = str_replace("*","'",$stand_name);
                $stand_name_lowercase = strtolower($stand_name_apostrofo);
                $stand_name_lowercase = str_replace(" ", "_", $stand_name_lowercase);
                $stand_name_lowercase = str_replace("'", "", $stand_name_lowercase);

                echo "<h1><a href='#'>$stand_name_apostrofo</a></h1>";

                if ($username){
                    $preferiti_txt = $is_favorite ? "Rimuovi dai preferiti" : "Aggiungi ai preferiti";
                    $preferiti_link = $is_favorite ? "delete_from_favorites" : "add_to_favorites";
                    $preferiti_style = $is_favorite ? "background-color: red;" : "background-color: rgb(23, 226, 23);";
                    
                    echo <<<EOD
                        <div id="tv">
                            <div id="tv__img">
                                <img src="../immagini/tv.webp" alt="" class="television">
                                <img src="../immagini/video_$stand_name_lowercase.gif" class="gif">
                            </div>

                            <a href="?nome=$stand_name&$preferiti_link=" class="bottone_preferiti" style='$preferiti_style'>
                                <p>$preferiti_txt</p>
                                <img src="../immagini/star_icon_full.png">    
                            </a>
                        </div>
                    EOD;
                }else{
                    echo <<<EOD
                    <div id="tv">
                        <div id="tv__img">
                            <img src="../immagini/tv.webp" alt="" class="television">
                            <img src="../immagini/video_$stand_name_lowercase.gif" class="gif">
                        </div>
                    </div>
                EOD;
                }
                
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
