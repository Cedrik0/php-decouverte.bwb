<?php
// Passe de /xxx.php a /?p=xxx
if (file_exists('contents/' . (isset($_GET['p']) ? $_GET['p'] : 'home') . '.php') || !preg_match("#^[a-zA-Z0-9\-\_\/]+$#", isset($_GET['p']))) {
    include('contents/' . (isset($_GET['p']) ? $_GET['p'] : 'home') . '.php');
} else {
// La page 404
    $_GET['p'] = "404";
    include('contents/' . (isset($_GET['p']) ? $_GET['p'] : $_GET['p']) . '.php');
}
?>