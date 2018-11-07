<?php

    session_start(); 
    
    include 'functions.php'; 

    checkLoggedIn(); 

    
    session_destroy(); 
    
    header("Location: index.php"); 
?>
