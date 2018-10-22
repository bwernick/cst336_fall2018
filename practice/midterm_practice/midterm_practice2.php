<?php

function getDatabaseConnection() {
    $host = "localhost";
    $username = "bradley";
    $password = "cst336";
    $dbname = "midterm"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

$dbConn = getDatabaseConnection(); 

//List all cities/towns that have a population between 50,000 and 80,000
$sql = "SELECT town_name, population from mp_town where (population >= 50000) and (population <= 80000)"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$between_pop = $statement->fetchAll();

//List all towns and population, ordered by population
$sql = "SELECT town_name, population from mp_town order by population desc"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$town_pop = $statement->fetchAll();

//List the three least populated towns
$sql = "SELECT town_name, population from mp_town order by population asc limit 3"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$least_pop = $statement->fetchAll();


//List the counties that start with the letter "S"
$sql = "SELECT county_name from mp_county where county_name like 'S%'"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$s_counties = $statement->fetchAll();


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
            
            //List all cities/towns that have a population between 50,000 and 80,000
            echo "<h4>All cities/towns that have a population between 50,000 and 80,000</h4><br>";
            foreach ($between_pop as $item){
                print($item['town_name']);
                echo " ";
                print($item['population']);
                echo "<br>";
            }
            echo "<br><br>";
            
            //List all towns and population, ordered by population
            echo "<h4>All towns and population, ordered by population</h4><br>";
            foreach ($town_pop as $item){
                print($item['town_name']);
                echo "\t";
                print($item['population']);
                echo "<br>";
            }
            echo "<br><br>";
            
            //List the three least populated towns
            echo "<h4>The three least populated towns</h4><br>";
            foreach ($least_pop as $item){
                print($item['town_name']);
                echo "\t";
                print($item['population']);
                echo "<br>";
            }
            echo "<br><br>";
            
            //List the counties that start with the letter "S"
            echo "<h4>Counties that start with the letter 'S'</h4><br>";
            foreach ($s_counties as $item){
                print($item['county_name']);
                echo "<br>";
            }
            echo "<br><br>";
            
        ?>
    </body>
</html>