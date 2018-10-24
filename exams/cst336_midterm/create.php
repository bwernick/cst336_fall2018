<?php
    function redirect(){
        header("Location: cst336_midterm.php", true, 301);
        exit();
    }
?>
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
   
    echo "<h1>Create a Quote:</h1>";
    echo "<br>";
    
    echo "<ul>";
    //CHeck for empty fields when submitting a new quote. 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['quote'])){
            echo "<li><h3>Text must not be empty</h3></li>";
        }
        if(empty($_POST['author'])){
            echo "<li><h3>Author must not be empty</h3></li>";
        }
    }
    echo "</ul>";
    
    if(!empty($_POST['quote']) && !empty($_POST['author'])){
        $text = $_POST['quote'];
        $author = $_POST['author'];
        
        $dbConn = getDatabaseConnection(); 
        
        $sql = "INSERT INTO `q_quotes`(`quoteId`, `quote`, `author`, `num_likes`) VALUES (NULL,'$text','$author','0')";
        $statement = $dbConn->prepare($sql); 
        $statement->execute();
        
        redirect();
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create a Quote</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="form">
            <form method="post" action="create.php">
                <label for="quote">Text:</label>
                <input type="text" name="quote"/>
                <br><br>
                <label for="author">Author:</label>
                <input type="text" name="author"/>
                <br><br>
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
    </body>
</html>