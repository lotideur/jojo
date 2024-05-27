<?php
    if (isset($_GET["username"])) $username = $_GET["username"]; else $username = "";
    if (isset($_GET["password"])) $password = $_GET["password"]; else $password = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteca-Login</title>
</head>
<body>
    <div class="contenuto">
        <h1>Biblioteca Online</h1>
		<h2>Pagina di Login</h2>

        <form action="" method="get">
            <table class="tab_input">
                <tr>
                    <td><label for="username">Username: </label></td>
                    <td><input type="text" name="username" id="username" value = "<?php echo $username ?>" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <input type="submit" value="Accedi">
        </form>
        <?php
            if (isset($_GET["username"]) and isset($_GET["password"])) {
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
                            <a href="registrazione.php">Se non sei registrato fallo</a>
                        </div>
                    EOD;
                    $conn->close();
                } else {
                    session_start();
                    $_SESSION["username"] = $username;

                    $conn->close();
					header("location: ../index.php");
                }

                /*
                    // Versione con l'uso dell'hash

                    $myquery = "SELECT username, password 
                                FROM utenti
                                WHERE username='$username'";

                    $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

                    if($ris->num_rows == 0 or password_verify($password, $ris->fetch_assoc()['password'])){
                        echo "<p>Utente non trovato o password errata</p>";
                        $conn->close();
                    } 
                    else {
                        $_SESSION["username"]=$username;
                                                
                        $conn->close();
                        header("location: pagine/home.php");
                    }
                */
            }
        ?>
    </div>
</body>
</html>