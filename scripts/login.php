<?php
session_start();

// verifie si il y a POST, si oui il défini si SESSION est egal a POST, sinon il detruit la SESSION et redirige vers la homepage
if($_POST){
    $_SESSION['username'] = $_POST["username"];
    header('Location: /');
}else{
    session_destroy();
    header('Location: /');
}
