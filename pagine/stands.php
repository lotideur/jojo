<!DOCTYPE html>
<html lang="en">

<?php
    $search_input_stand_name = "";
    if (isset($_GET["stand_name"])) {$stand_name = $_GET["stand_name"];} else {$stand_name = "";}
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
            <div id="pb_banner">
                <div id="pb_banner__left">
                    <img src="../immagini/death13_stands_bg.jpg" alt="">
                    <img src="../immagini/fade_h.png" alt="">
                </div>
                <div id="pb_banner__right">
                    <!-- <img src="../immagini/pb_logo.png" alt=""> -->
                    <h2>STANDS</h2>
                </div>
            </div>

            <div id="other_title">
                <img src="../immagini/logo_english.png" alt="">
                <h2>STANDS</h2>
            </div>

            <div id="plot">
                <h2>Un power system unico nel suo genere!</h2>
                
                <p>Uno Stand (スタンド Sutando) è una manifestazione visiva dell'energia vitale (in altre parole, la manifestazione dell'anima di chi lo utilizza).</p>
                <p>Generalmente si presenta come una figura sospesa sopra o vicino all'utilizzatore e possiede abilità superiori a quelle di un normale essere umano.</p>
            </div>

            <div id="search_engine">
                <h2>Cerca uno stand!</h2>

                <!-- <form method="get" action="#search_engine">
                    <input type="text" name="search_input_stand_name" placeholder="Nome stand"><br/>
                    <input type="submit" value="Cerca">
                </form> -->


                <form method="get" action="#search_engine">
                    <table class="tab_input">
                        <tr>
                            <td><label for="stand_name"><h2>Nome Stand: </h2></label></td>
                            <td><input type="text" id="stand_name" name="search_input_stand_name" value="<?php echo $stand_name ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="user_name"><h2>Nome Portatore: </h2></label></td>
                            <td><input type="text" id="user_name"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Cerca" id="search_input_submit"></td>
                        </tr>
                    </table>
                </form>

                <div id="searched_stands">
                    <?php
                        if (isset($_GET["search_input_stand_name"])) {
                            require("../data/connessione_db.php");
                            $search_input_stand_name = $_GET["search_input_stand_name"];

                            $sql = "SELECT nome
                                    FROM stand
                                    WHERE nome LIKE '%$search_input_stand_name%'";

                            $search_ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                            
                            if ($search_ris->num_rows == 0) {
                                echo "<p>Stand non trovato.</p>";
                                $conn->close();
                            } else {
                                foreach($search_ris as $riga){
                                    $stand_name = $riga["nome"];
                                    $lc_stand_name = strtolower($stand_name);
                                    $lc_stand_name = str_replace(" ", "_", $lc_stand_name);
                                //     $titolo = $riga["titolo"];
                                //     $copertina = $riga["copertina"];
                                //     $nome = $riga["nome"];
                                //     $cognome = $riga["cognome"];
                
                                    echo <<<EOD
                                        <div class='searched_stands__card'>
                                            <a href="stand_ricerca.php?nome=$stand_name"><img src='../immagini/stand_img_$lc_stand_name.png' alt=''></a>
                                            <div class='searched_stands__card__tag'>
                                                <h2>$stand_name</h2>
                                            </div>
                                        </div>
                                    EOD;
                                }
                                
                                
                                // session_start();
                                // $_SESSION["stand_name"] = $stand_name;
                                // echo "<img src='../immagini/stand_".$stand_name.".png' alt=''>";
                                // echo "../immagini/stand_'.$stand_name.'.png";
                                
                                
                            //     $conn->close();
                            //     header("location: pagine/home.php");
                            }
                        }

                    ?>
                </div>

                <!-- <div class="searched_stand_card">
                    <img src="../immagini/stand_img_anubis.png" alt="">
                </div> -->

            </div>

        </main>

        <div class="gototop"><img src="../immagini/gototop_shadow.png" alt=""></div>

        <footer>
            <p>Authors | F. Banani, L. Sambo</p>
        </footer>


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){

            var nav = $(".nav_stripe");
            var gototop = $(".gototop");
            var araki = $(".araki")
            // var scroll_button_right = $("#parts").find(".scroll_button--right")
            // var scroll_button_left = $("#parts").find(".scroll_button--left")
            // var parts_scroll_index = 0
            // var max_scroll_index = 2
            // var parts_cards = $("#parts").find(".parts__cards")
            // var parts_title = $("#parts").find("h2")

            // var y_scroll_positions = [0, $("#plot").position().top-200, araki.position().top-70, $("#stands").position().top-200, $("#parts").position().top-20]

            nav.find(".nav_button").on("click", function(){
                var nav_button = $(this);

                var index = nav_button.index()-2
                // var y_pos = y_scroll_positions[index]

                nav.find(".nav_button").removeClass("nav_button--active");
                nav_button.addClass("nav_button--active");
                
                // window.scrollTo({top: y_pos, behavior: 'smooth'});
            });

            window.onscroll = function(){
                nav.removeClass("nav_stripe--scroll");
                if (window.scrollY > 50){
                    nav.addClass("nav_stripe--scroll");
                }

                if (window.scrollY > 200){
                    if (!gototop.hasClass("gototop--show")){
                        gototop.addClass("gototop--show");
                    }
                } else if (window.scrollY <= 200 && gototop.hasClass("gototop--show")){
                    gototop.removeClass("gototop--show");
                    console.log("REMOVE");
                }
            };
            
            gototop.on("click", function(){
                window.scrollTo({top: 0, behavior: 'smooth'});
            });
            
            // function apply_index(){
            //     scroll_button_right.css({display: "none"});
            //     scroll_button_left.css({display: "none"});

            //     var left = (100 / (max_scroll_index+1)) * parts_scroll_index;
            //     if (max_scroll_index == 0){left = 0;}
                
            //     parts_cards.css({left: -left + "%"});
            //     parts_title.css({width: 100/(max_scroll_index+1) + "%"})

            //     if (window.innerWidth < 1130){
            //         if (parts_scroll_index != max_scroll_index){
            //             scroll_button_right.css({display: "block"});
            //         }
            //         if (parts_scroll_index != 0){
            //             scroll_button_left.css({display: "block"});
            //         }
            //     }
            // }
            // apply_index();

            // window.onresize = function(){
            //     if (window.innerWidth < 1130){
            //         max_scroll_index = 1;
            //         if (window.innerWidth < 768){
            //             max_scroll_index = 2;
            //         }
            //         if (parts_scroll_index > max_scroll_index){parts_scroll_index = max_scroll_index;}
            //         console.log(max_scroll_index);
            //     }else{max_scroll_index = 0;}
            //     apply_index();
            // }

            // scroll_button_right.on("click", function(){
            //     if (parts_scroll_index < max_scroll_index){
            //         parts_scroll_index += 1;
            //         apply_index();
            //     }
            // });

            // scroll_button_left.on("click", function(){
            //     if (parts_scroll_index > 0){
            //         parts_scroll_index -= 1;
            //         apply_index();
            //     }
            // });
        })

        </script>

    </div>
</body>

</html>
