<div class="dati_personali">
    <h1>Modifica i tuoi dati personali</h1>
    <form action="?dati_modificati=" method="post">
        <table class="tab_input tab_registrazione">
            <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" name="username" id="username" value="<?php echo $username ?>" disabled></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="text" name="password" id="password" value="<?php echo $password ?>"></td>
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
        <input type="submit" value="Modifica" class="submit">
    </form>
    <?php
        if (isset($_GET["dati_modificati_salvati"])){
            echo "<p>Le modifiche sono state apportate correttamente!</p>";
            header("Refresh: 3; URL=profilo.php");
        }
    ?>
</div>