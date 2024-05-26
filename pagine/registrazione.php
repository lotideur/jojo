<?php
    if (isset($_GET["username"])) {$username = $_GET["username"];} else {$username = "";}
	if (isset($_GET["password"])) {$password = $_GET["password"];} else {$password = "";}
    if(isset($_GET["conferma"])) $conferma = $_GET["conferma"];  else $conferma = "";
    if(isset($_GET["nome"])) $nome = $_GET["nome"];  else $nome = "";
    if(isset($_GET["cognome"])) $cognome = $_GET["cognome"];  else $cognome = "";
    if(isset($_GET["email"])) $email = $_GET["email"];  else $email = "";
    if(isset($_GET["quiz_result"])) $telefono = $_GET["quiz_result"];  else $quiz_result = "";

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Biblioteca-Registrazione</title>
</head>
<body>
    <div class="contenuto">
        <h1>Registrazione</h1>
        <form action="" method="get">
            <!-- da far vedere come ho cambiato lo stile per gli input -->
            <table class="tab_input tab_registrazione">
                <tr>
                    <td><label for="username">Username: </label></td>
                    <td><input type="text" name="username" id="username" value="<?php echo $username ?>" required></td>
                    
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td><label for="conferma">Conferma password: </label></td>
                    <td><input type="password" name="conferma" id="conferma" required></td>
                </tr>
                <tr>
                    <td><label for="nome">Nome: </label></td>
                    <td><input type="text" name="nome" id="nome" <?php echo "value = '$nome'" ?>></td>
                </tr>
                <tr>
                    <td><label for="cognome">Cognome: </label></td>
                    <td><input type="text" name="cognome" id="cognome" <?php echo "value = '$cognome'" ?>></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" name="email" id="email" <?php echo "value = '$email'" ?>></td>
                </tr>
            </table>
            <input type="submit" value="Invia">
        </form>

        <p>
            <?php
            if(isset($_GET["username"]) and isset($_GET["password"])) {
                if ($_GET["username"] == "" or $_GET["password"] == "") {
                    echo "username e password non possono essere vuoti!";
                } elseif ($_GET["password"] != $_GET["conferma"]){
                    echo "<p>Le password inserite non corrispondono</p>";
                } else {
                    require("../data/connessione_db.php");

                    $myquery = "SELECT username 
						    FROM user
						    WHERE username='$username'";
                    //echo $myquery;

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "Questo username è già stato usato";
                    } else {

                        $myquery = "INSERT INTO user (username, password, nome, cognome, email)
                                    VALUES ('$username', '$password', '$nome', '$cognome','$email')";
                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["username"]=$username;
                            
						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            header('Refresh: 5; URL=../index.html');

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>
    </div>
</body>
</html>