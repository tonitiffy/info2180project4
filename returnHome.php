<?php
    session_start();
    //header("location: home.html");
    echo file_get_contents("home.html");
?>