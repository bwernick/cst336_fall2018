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

//get a random quote
$sql = "SELECT * from q_quotes "; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$quotes = $statement->fetchAll();

//get a random quote
$display = $quotes[rand(0, count($quotes))];

echo '<div class="quote"><h1>' . $display['quote'] . '</h1></div>';
echo '<div class="author"><h2><i>-' . $display['author'] . '</i></h2></div>';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quotes</title>
         <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div>
            <a href="create.php">Create</a>
        </div>
    </body>
</html>