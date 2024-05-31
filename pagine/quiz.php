<?php 
    session_start();
    if (isset($_SESSION["username"])) {$username = $_SESSION["username"];} else {$username = "";}

    if($username == ""){
        $_SESSION["quiz"]="quiz.php";
        header("location: login.php");
    }else{
        echo "coccoSSS";;
    }
?>