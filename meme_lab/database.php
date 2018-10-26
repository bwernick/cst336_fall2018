<?php
// connect to our mysql database server

function getDatabaseConnection() {
    if ($_SERVER['SERVER_NAME'] == "cst336-fall-2018-uuts.c9users.io") { // running on cloud9
        $host = "localhost";
        $username = "bradley";
        $password = "cst336";
        $dbname = "meme_lab"; 
    }else{
        //JAWSDB (faster than ClearDB)
        $host = "tj5iv8piornf713y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $username = "f89d4v70t1c7x38p";
        $password = "f3qapnhmsbtvmehi";
        $dbname = "q04pglwa9t4hfqjm"; 
    }
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

?>
