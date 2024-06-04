<div class="stand_preferiti">
    <h1><em>Stand preferiti</em></h1>

    <?php
        require("../data/connessione_db.php");
        $sql = "SELECT stand FROM preferiti WHERE username = '$username'";
        $ris = $conn->query($sql) or die("<p>Query fallita".$conn->error."</p>");

        if ($ris->num_rows > 0){
            echo "<div class='stands'>";
            foreach ($ris as $riga){
                $stand_name = $riga["stand"];
                $stand_name_apostrofo = str_replace("*","'",$stand_name);
                
                $stand_name_lowercase = strtolower($stand_name_apostrofo);
                $stand_name_lowercase = str_replace(" ", "_", $stand_name_lowercase);
                $stand_name_lowercase = str_replace("'", "", $stand_name_lowercase);
                
                echo <<<EOD
                    <div class='searched_stands__card'>
                        <a href="stand_cercato.php?nome=$stand_name"><img src='../immagini/stand_img_$stand_name_lowercase.png' alt=''></a>
                        <div class='searched_stands__card__tag'>
                            <h2>$stand_name_apostrofo</h2>
                        </div>
                    </div>
                EOD;
            }
            echo "</div>";
        }else{
            echo "<p>Non ci sono stand preferiti...</p>";
        }
    ?>

</div>