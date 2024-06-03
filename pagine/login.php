<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_style.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="background">
            <img src="../immagini/banner2.webp" alt="">
        </div>

        <div class="panel">
            <h1>Login</h1>

            <form action="" method="post">
                <table class="tab_input">
                    <tr>
                        <td><label for="username"><b>Username: </b></label></td>
                        <td><input type="text" name="username" id="username" value = "<?php echo $username ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="password"><b>Password: <b></label></td>
                        <td><input type="password" name="password" id="password" required></td>
                    </tr>
                </table>
                <input type="submit" value="Accedi" class="submit">
            </form>

            <?php
                if (isset($_POST["username"]) and isset($_POST["password"])) {
                    require("../data/connessione_db.php");

                    $myquery = "SELECT username, password 
                                FROM user
                                WHERE username='$username'
                                    AND password='$password'";

                    $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

                    if ($ris->num_rows == 0) {
                        echo <<<EOD
                            <div>
                                <p>Utente o password non trovati.</p> 
                            </div>
                        EOD;
                        $conn->close();
                    } else {
                        session_start();
                        // $_SESSION["username"] = "";
                        $_SESSION["username"] = $username;

                        $conn->close();
                        if (isset($_GET["redirect"])){
                            $redirect = $_GET["redirect"];
                            header("location: $redirect");
                        }else{
                            header("location: ../index.php");
                        }
                    }
                }
            ?>
            
            <div class="reg"><hr><a href="registrazione.php">Non hai ancora un account?</a></div>

            <a href="../index.php" class="home_button"><img src="../immagini/home2.png" alt=""></a>

        </div>
    </main>


</body>

</html>
