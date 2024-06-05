<?php 
    session_start();
    if (isset($_SESSION["username"])) {$username = $_SESSION["username"];} else {$username = "";}

    if($username == ""){
        header("location: login.php?redirect=../pagine/quiz.php");
    }
    
    $num_domande = 4;

    if (isset($_GET["start_quiz"])){
        unset($_GET["start_quiz"]);

        $_SESSION["quiz_index"] = 0;

        $tot_domande = range(0, $num_domande);
        $rand_domande_cod = [];

        $i = 0;
        while ($i < $num_domande){
            $i += 1;
            $rand = random_int(0, sizeof($tot_domande));
            while (in_array($rand, $rand_domande_cod)){
                $rand = random_int(0, sizeof($tot_domande));
            }
            $rand_domande_cod[] = $rand;
        }
        $_SESSION["rand_domande_cod"] = $rand_domande_cod;

        header("Location: quiz.php");
    }elseif (isset($_SESSION["quiz_index"])){
        if (isset($_GET["risposto"])){
            $_SESSION["quiz_index"] += 1;
            if ($_SESSION["quiz_index"] >= 4){
                unset($_SESSION["quiz_index"]);
                
                $num = $_SESSION["num_risposte_corrette"];
                
                require("../data/connessione_db.php");
                $sql = "INSERT INTO quiz_fatti (username, punteggio)
                        VALUES ('$username', '$num')";
                $conn->query($sql) or die("<p>Query fallita".$conn->error."</p>");
                
                unset($_SESSION["num_risposte_corrette"]);
                header("Location: profilo.php?categoria=risultati_quiz");
            
            }elseif($_SESSION["quiz_index"] == 1){
                $_SESSION["num_risposte_corrette"] = 1;
            }
            if (isset($_GET["corretto"])){
                $_SESSION["num_risposte_corrette"] += 1;
                if ($_SESSION["num_risposte_corrette"] > 4){
                    $_SESSION["num_risposte_corrette"] = 4;
                }
            }
            header("Location: quiz.php");
        }
    }
    else{
        if (isset($_SESSION["num_risposte_corrette"])){
            $_SESSION["appena_svolto"] = "";
            header("Location: profilo.php?categoria=risultati_quiz");
        }else{
            header("Location: ../index.php");
        }
    }
    
    $index = $_SESSION["quiz_index"];
    $shown_index = $index+1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quiz_style.css">
    <title>Quiz</title>
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
        </div>

    </header>

    <main>
        <div class="background">
            <img src="../immagini/banner9.jpg" alt="">
        </div>

        <h1>Riuscirai a rispondere correttamente a tutte le domande?</h1>

        <div class="question_panel">
            <div class="question_box">

                <?php

                    if (isset($_SESSION["rand_domande_cod"]) and isset($_SESSION["quiz_index"])){
                        $rand_domande_cod = $_SESSION["rand_domande_cod"];
                        $cod = $rand_domande_cod[$_SESSION["quiz_index"]];
                        
                        require("../data/connessione_db.php");
                        $sql = "SELECT domanda, risposta_vera, risposta_falsa_1, risposta_falsa_2, risposta_falsa_3
                                FROM domanda_quiz
                                WHERE cod = '$cod'";
                        $ris = $conn->query($sql)->fetch_assoc() or die("<p>Query fallita".$conn->error."</p>");
                        
                        $domanda = $ris["domanda"];

                        echo "<h1>$domanda</h1>";
                    }

                ?>

                <h2>Domanda <?php echo"$shown_index/$num_domande"; ?></h2>
            </div>
            <hr>
            <div class="answers_box">
                
                <?php
                    if (isset($_SESSION["rand_domande_cod"]) and isset($_SESSION["quiz_index"])){
                        $rand_domande_cod = $_SESSION["rand_domande_cod"];
                        $cod = $rand_domande_cod[$_SESSION["quiz_index"]];

                        $sql = "SELECT domanda, risposta_vera, risposta_falsa_1, risposta_falsa_2, risposta_falsa_3
                                FROM domanda_quiz
                                WHERE cod = '$cod'";
                        $ris = $conn->query($sql)->fetch_assoc() or die("<p>Query fallita".$conn->error."</p>");
                        
                        $answers = ["A-".$ris["risposta_vera"],"B-".$ris["risposta_falsa_1"],"C-".$ris["risposta_falsa_2"],"D-".$ris["risposta_falsa_3"]];
                        foreach ($answers as $answer){
                            $ans_letter = explode("-", $answer)[0];
                            $ans_txt = explode("-", $answer)[1];
                            
                            $link = $ris["risposta_vera"] == $ans_txt ? "&corretto=" : "";

                            echo <<<EOD
                            
                            <a class="answer" href="?risposto='$link'">
                                <div class="answer_icon"><b>$ans_letter</b></div>
                                <b><em>$ans_txt</em></b>
                            </a>

                            EOD;
                        }
                    }
                ?>

                <!-- <a class="answer">
                    <div class="answer_icon"><b>A</b></div>
                    <b><em>The World</em></b>
                </a>
                <a class="answer"><b><em>Star Platinum</em></b></a>
                <a class="answer"><b><em>Red Hot Chili Pepper</em></b></a>
                <a class="answer"><b><em>Chocolate Disco</em></b></a> -->

            </div>
        </div>

    </main>

    <footer>
        <p class="info">Al termine del quiz, sarai reindirizzato alla pagina del risultato!</p>
        <p>Authors | F. Banani, L. Sambo</p>
    </footer>

</body>

</html>
