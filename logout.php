<?php
    session_start();
    session_unset();
    session_destroy();
    echo file_get_contents("index.html");
    //header("Location: index.html");
?>
