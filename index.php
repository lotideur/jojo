<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    if (isset($_SESSION["username"])) {$username = $_SESSION["username"];} else {$username = "";}
    // $_SESSION["username"] = "";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jojo's Bizzare Adventures</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="page_container">

        <header>
            <div class="white_stripe">

                <div class="logo">
                    <img src="immagini/logo_english.png" alt="">
                </div>

                <p>ジョジョの奇妙な冒険</p>

                <div class="logo">
                    <img src="immagini/logo.png" alt="">
                </div>

                <div class="profile">
                    <?php
                        // $username = $_SESSION["username"];
                        if ($username == ""){
                            echo "<a href='pagine/login.php'><img src='immagini/avatar_default.png' class='profile_img' alt=''><img src='immagini/logout_icon.png' class='logout_icon--hide' alt=''></a>";
                        }else{
                            echo "<a href='pagine/logout.php'><img src='immagini/araki_outline.png' class='profile_img-logged' alt=''><img src='immagini/logout_icon.png' class='logout_icon' alt=''></a>";
                        }
                    ?>
                </div>

            </div>

            <div class="nav_stripe">
                <div class="category_text">
                    <p>Categorie</p>
                </div>
                <div class="category_text">
                    <p> > </p>
                </div>
                <div class="nav_button"><a>
                        <p>Jojo</p>
                    </a></div>
                <div class="nav_button"><a>
                        <p>Trama</p>
                    </a></div>
                <div class="nav_button"><a>
                        <p>Autore</p>
                    </a></div>
                <div class="nav_button"><a>
                        <p>Stand</p>
                    </a></div>
                <div class="nav_button"><a>
                        <p>Parti</p>
                    </a></div>
                <div class="donate_button"><a href="https://web.spaggiari.eu/home/app/default/login.php">
                        <p>Dona</p><img src="immagini/heart.png" alt="">
                    </a></div>
            </div>
        </header>

        <main>
            <div id="banner">
                <img src="immagini/giorno_bleeding.jpg" alt="">
                <img src="immagini/chariotrequiem2.png" alt="">
                <img src="immagini/fade.png" alt="" id="banner__title__fade">

                <div id="banner__title">
                    <img src="immagini/title_fancy.png" alt="" id="banner__title__title">
                    <p>"I, Giorno Giovanna, have a dream..."</p>
                </div>
            </div>

            <div id="other_title">
                <img src="immagini/logo_english.png" alt="">
                <h2>Le bizzarre avventure di JoJo</h2>
            </div>

            <div id="gallery">
                <div class="gallery__picture gallery__picture--1"><img src="immagini/emporio.webp" alt=""></div>
                <div class="gallery__picture gallery__picture--2"><img src="immagini/giorno.jpg" alt=""></div>
                <div class="gallery__picture gallery__picture--3"><img src="immagini/doppio.jpg" alt=""></div>
                <div class="gallery__picture gallery__picture--4"><img src="immagini/dio_part6.jpg" alt=""></div>
                <div class="gallery__picture gallery__picture--5"><img src="immagini/jotaro_disk.jpg" alt=""></div>

                <!-- DUPLICATI PER IL LOOP -->
                <div class="gallery__picture gallery__picture--1"><img src="immagini/emporio.webp" alt=""></div>
                <div class="gallery__picture gallery__picture--2"><img src="immagini/giorno.jpg" alt=""></div>
                <div class="gallery__picture gallery__picture--3"><img src="immagini/doppio.jpg" alt=""></div>
            </div>

            <div id="plot">
                <h2>Un racconto coinvolgente, colmo di avventure inaspettate e bizzarre</h2>

                <p>La storia narra l'epopea del casato Joestar in lotta contro il potente e malvagio vampiro Dio Brando.
                </p>
                <p>Le conseguenze delle sue azioni attraversano un arco temporale che oltrepassa i secoli.</p>
            </div>

            <div class="araki">
                <img src="immagini/fade.png" alt="" class="araki__fade">
                <img src="immagini/araki_shadow1.png" alt="" class="araki__1">
                <div class="araki__box">
                    <h2>Hirohiko Araki</h2>
                    <p>Hirohiko Araki (荒木 飛呂彦), nato Toshiyuki Araki (荒木 利之) è un artista manga giapponese e autore di
                        Le bizzarre avventure di JoJo. Nato il 7 giugno 1960, ha debuttato nel 1980 con il suo one-shot
                        Poker Under Arms, e ha iniziato la sua carriera professionale con le serie brevi Cool Shock
                        B.T., Baoh the Visitor e Gorgeous Irene.</p>
                    <p>Il suo lavoro su Le bizzarre avventure di JoJo è diviso in più parti e continua ad essere
                        serializzato per oltre 35 anni, per un totale di 132 volumi (ad agosto 2023), circolando oltre
                        120 milioni di copie (gennaio 2022). Il suo stile è stato descritto come un "approccio
                        sperimentale, ma definitivo". </p>
                </div>
                <img src="immagini/araki_shadow2.png" alt="" class="araki__2">
            </div>

            <div id="stands">
                <div id="stands__img">
                    <img src="immagini/notoriousbig.webp" alt="">
                    <img src="immagini/clash.webp" alt="">
                </div>
                <div id="stands__box">
                    <h2>Un power system unico nel suo genere...</h2>

                    <!-- <div id="stands__box__button"><a href="">Scopri di più</a></div> -->
                    
                    <div id="stands__box__button"><a href="pagine/stands.php">
                        <h3>Scopri di più</h3>
                    </a></div>

                    <!-- <p>Stand, un'entità generata psichicamente dal suo proprietario. Possiede abilità sovrumane che, a
                        seconda del portatore, possono essere brandite per il bene o per il male.</p> -->
                </div>
            </div>

            <div id="parts">
                <img src="immagini/fade.png" alt="">
                <h2>Scopri di più sulle parti!</h2>
                <div class="parts__cards">
                    <div class="parts__cards__card"><a href="pagine/part1.php">
                            <img src="immagini/johnathan_mugshot_shadow.png" alt="">
                            <img src="immagini/jonathan_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Phantom Blood</p>
                            </div>
                        </a></div>
                    <div class="parts__cards__card"><a href="pagine/part2.php">
                            <img src="immagini/joseph_mugshot_shadow.png" alt="">
                            <img src="immagini/joseph_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Battle Tendency</p>
                            </div>
                        </a></div>
                    <div class="parts__cards__card"><a href="pagine/part3.php">
                            <img src="immagini/jotaro_mugshot_shadow.png" alt="">
                            <img src="immagini/jotaro_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Stardust Crusaders</p>
                            </div>
                        </a></div>
                    <div class="parts__cards__card"><a href="pagine/part4.php">
                            <img src="immagini/josuke_mugshot_shadow.png" alt="">
                            <img src="immagini/josuke_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Diamond is Unbreakable</p>
                            </div>
                        </a></div>
                    <div class="parts__cards__card"><a href="pagine/part5.php">
                            <img src="immagini/giorno_mugshot_shadow.png" alt="">
                            <img src="immagini/giorno_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Golden Wind</p>
                            </div>
                        </a></div>
                    <div class="parts__cards__card"><a href="pagine/part6.php">
                            <img src="immagini/jolyne_mugshot_shadow.png" alt="">
                            <img src="immagini/jolyne_mugshot1.png" alt="">
                            <div class="parts__cards__card__tag">
                                <p>Stone Ocean</p>
                            </div>
                        </a></div>
                </div>
                <div class="scroll_button scroll_button--left"><img src="immagini/gototop_shadow.png" alt=""></div>
                <div class="scroll_button scroll_button--right"><img src="immagini/gototop_shadow.png" alt=""></div>
            </div>
        </main>

        <div class="gototop"><img src="immagini/gototop_shadow.png" alt=""></div>

        <footer>
            <p>Authors | F. Banani, L. Sambo</p>
        </footer>


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                var nav = $(".nav_stripe");
                var gototop = $(".gototop");
                var araki = $(".araki")
                var scroll_button_right = $("#parts").find(".scroll_button--right")
                var scroll_button_left = $("#parts").find(".scroll_button--left")
                var parts_scroll_index = 0
                var max_scroll_index = 2
                var parts_cards = $("#parts").find(".parts__cards")
                var parts_title = $("#parts").find("h2")

                var y_scroll_positions = [0, $("#plot").position().top - 200, araki.position().top - 70, $("#stands").position().top - 200, $("#parts").position().top - 20]

                nav.find(".nav_button").on("click", function () {
                    var nav_button = $(this);

                    var index = nav_button.index() - 2
                    var y_pos = y_scroll_positions[index]

                    nav.find(".nav_button").removeClass("nav_button--active");
                    nav_button.addClass("nav_button--active");

                    window.scrollTo({ top: y_pos, behavior: 'smooth' });
                });

                window.onscroll = function () {
                    nav.removeClass("nav_stripe--scroll");
                    if (window.scrollY > 50) {
                        nav.addClass("nav_stripe--scroll");
                    }

                    if (window.scrollY > 200) {
                        if (!gototop.hasClass("gototop--show")) {
                            gototop.addClass("gototop--show");
                        }
                    } else if (window.scrollY <= 200 && gototop.hasClass("gototop--show")) {
                        gototop.removeClass("gototop--show");
                        console.log("REMOVE");
                    }

                    if (window.scrollY > 1400) {
                        if (!araki.hasClass("araki--show")) {
                            araki.addClass("araki--show");
                        }
                    }
                };

                gototop.on("click", function () {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });

                function apply_index() {
                    scroll_button_right.css({ display: "none" });
                    scroll_button_left.css({ display: "none" });

                    var left = (100 / (max_scroll_index + 1)) * parts_scroll_index;
                    if (max_scroll_index == 0) { left = 0; }

                    parts_cards.css({ left: -left + "%" });
                    parts_title.css({ width: 100 / (max_scroll_index + 1) + "%" })

                    if (window.innerWidth < 1130) {
                        if (parts_scroll_index != max_scroll_index) {
                            scroll_button_right.css({ display: "block" });
                        }
                        if (parts_scroll_index != 0) {
                            scroll_button_left.css({ display: "block" });
                        }
                    }
                }
                // apply_index();

                window.onresize = function () {
                    if (window.innerWidth < 1130) {
                        max_scroll_index = 1;
                        if (window.innerWidth < 768) {
                            max_scroll_index = 2;
                        }
                        if (parts_scroll_index > max_scroll_index) { parts_scroll_index = max_scroll_index; }
                        console.log(max_scroll_index);
                    } else { max_scroll_index = 0; }
                    apply_index();
                }

                scroll_button_right.on("click", function () {
                    if (parts_scroll_index < max_scroll_index) {
                        parts_scroll_index += 1;
                        apply_index();
                    }
                });

                scroll_button_left.on("click", function () {
                    if (parts_scroll_index > 0) {
                        parts_scroll_index -= 1;
                        apply_index();
                    }
                });
            })

        </script>

    </div>
</body>

</html>
