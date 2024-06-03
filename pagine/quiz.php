<?php 
    session_start();
    if (isset($_SESSION["username"])) {$username = $_SESSION["username"];} else {$username = "";}

    if($username == ""){
        header("location: login.php?redirect=../pagine/quiz.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quiz_style.css">
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
        </div>

    </header>

    <main>
        <div class="background">
            <img src="../immagini/banner9.jpg" alt="">
        </div>

        <h1>Riuscirai a rispondere correttamente a tutte le domande?</h1>

        <div class="question_panel">
            <div class="question_box">
                <h1>Quale di questi è lo stand di DIO?</h1>
                <h2>Domanda 1/12</h2>
            </div>
            <hr>
            <div class="answers_box">

                <?php
                    $answers = ["A-The World", "B-Star Platinum", "C-Red Hot Chili Pepper", "D-Chocolate Disco"];
                    foreach ($answers as $answer){
                        $ans_letter = explode("-", $answer)[0];
                        $ans_txt = explode("-", $answer)[1];

                        echo <<<EOD

                        <a class="answer">
                            <div class="answer_icon"><b>$ans_letter</b></div>
                            <b><em>$ans_txt</em></b>
                        </a>

                        EOD;
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
        <p>Authors | F. Banani, L. Sambo</p>
    </footer>

</body>

</html>
