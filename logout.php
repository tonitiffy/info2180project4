<?php
    session_start();
    session_unset();
    session_destroy();
    //fopen("index.html","r");
    //echo readfile("index.html");
    //echo file_get_contents("index.html");
    header("Location: index.html");
?>
