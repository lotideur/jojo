<div class="quiz">
    <?php
        $appena_svolto = isset($_SESSION["appena_svolto"]);
        unset($_SESSION["appena_svolto"]);

        require("../data/connessione_db.php");
        if (isset($_GET["quiz_eliminato"])){
            $quiz_eliminato = $_GET["quiz_eliminato"];

            $sql = "DELETE FROM quiz_fatti
                    WHERE cod = '$quiz_eliminato'";
            $conn->query($sql) or die("<p>Query fallita".$conn->error."</p>");

            header("Location: ?categoria=risultati_quiz");
        }
        
        $sql = "SELECT punteggio, cod
                FROM quiz_fatti
                WHERE username = '$username'
                ORDER BY cod";
        $ris = $conn->query($sql) or die("<p>Query fallita".$conn->error."</p>");

        if ($ris->num_rows > 0){
            echo "<h2>Sono stati eseguiti i seguenti quiz:</h2>";

            $righe = [];
            foreach($ris as $riga){
                $righe[] = $riga;
            }
            $righe = array_reverse($righe);

            echo "<div class='lista_quiz'>";
                foreach($righe as $riga){
                    $punteggio = $riga["punteggio"];
                    $cod = $riga["cod"];
                    $n = $cod."°";

                    $color = ["rgb(255, 51, 0)", "rgb(255, 51, 0)", "rgb(255, 191, 0)", "rgb(136, 255, 0)", "rgb(162, 255, 0)"][$punteggio];
                    $appena_svolto_txt = ($appena_svolto and $cod == 0) ? "(Quiz appena svolto)" : " ";

                    echo "<div class='quiz_card' style='background-color: $color'><p>$n quiz. Domande corrette: $punteggio/4 $appena_svolto_txt</p><a class='quiz_card__img' href='?categoria=risultati_quiz&quiz_eliminato=$cod'><img src='../immagini/logout_icon.png'></a></div>";
                    // $i += 1;
                }
            echo "</div>";

        }else{
            echo "<p>Non è stato eseguito nessun quiz fin'ora...</p>";
        }

    ?>
</div>
