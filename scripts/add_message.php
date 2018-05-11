<?php
session_start();

$message = json_encode($_POST);

$destination = $_SERVER['DOCUMENT_ROOT'] . "/data/messages.json";

file_put_contents($destination, $message);
header("Location: http://php-decouverte.bwb/?p=livre_d_or");
