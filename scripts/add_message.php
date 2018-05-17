<?php
/*session_start();

$message = json_encode($_POST);

$destination = $_SERVER['DOCUMENT_ROOT'] . "/data/messages.json";

file_put_contents($destination, $message);
header("Location: http://php-decouverte.bwb/?p=livre_d_or");

if(isset($_POST['message'])){

    $jsonChemin = file_get_contents('../data/messages.json');
    $listeMessages = json_decode($jsonChemin, true);



    $comUser = $_SESSION['username'];
    $com = $_POST['message'];

    if($listeMessages == NULL) {
        $listeMessages = array();
    }
    $comArray = array('user' => $comUser, 'message' => $com);

    array_push($listeMessages,$comArray);
    json_encode($listeMessages);

    $jsonfile = '../data/messages.json';
    file_put_contents($jsonfile,$listeMessages);
};*/