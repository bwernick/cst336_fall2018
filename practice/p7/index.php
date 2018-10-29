<?php
function getDatabaseConnection() {
    $host = "localhost";
    $username = "bradley";
    $password = "cst336";
    $dbname = "c9"; 

    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}
$dbConn = getDatabaseConnection(); 
function getResults(){
    global $dbConn;
    if(isset($_POST['submit'])){
        //$namedParameters = array();
        $q = $_POST['keyword'];
        $sql = "SELECT * from p1_quotes where quote like '%$q%'";
        if(!empty($_POST['catagory'])){
            $w = $_POST['catagory'];
            $sql .= " AND category like '$w'";    
        }
        if($_POST['order'] == 1){
            $sql .= " order by quote";
        }
        else if($_POST['order'] == 2){
            $sql .= " order by quote desc";
        }
        
        //$namedParameters[':keyword'] = "%" . $_POST['keyword'] . "%";
        $statement = $dbConn->prepare($sql); 
        
        $statement->execute(); 
        $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach ($results as $result) {
            echo $result['quote'] . " (<i>". $result['author'] . "</i>) <br><br>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
         <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header"><h1>Famous Quote Finder</h1><br></div>
        <div id="quoteForm">
            <form method="post">
                <label for="keyword">Enter Quote Keyword</label>
                <input type="text" name="keyword" value="<?=$_POST['keyword']?>"/><br>
                <label for="catagory">Category</label>
                <select name="catagory">
                    <option value=""></option>
                    <?php
                    $sql = "SELECT distinct category from p1_quotes"; 
                    $statement = $dbConn->prepare($sql); 
                    
                    $statement->execute(); 
                    $catagories = $statement->fetchAll(PDO::FETCH_ASSOC); 
                    print_r($catagories);
                    foreach ($catagories as $value){
                        ?>
                       <option <?= ($_POST['catagory'] == $value['category'])?" selected":"" ?> value = "<?php  $value['category']?>"> <?=$value['category']?> </option>;
                    <?php
                    }
                    ?>
                </select><br>
                <label for="order">Order:</label><br>
                <input type="radio" name="order" value="1" <?= ($_POST['order'] == "1")?" checked":""?> >A-Z<br>
                <input type="radio" name="order" value="2" <?= ($_POST['order'] == "2")?" checked":""?>>Z-A<br>
                <input type="submit" name="submit" value="Display Quotes!"/>
            </form>
        </div>
        <div class="quotes">
            <br>
            <?php getResults(); ?>
        </div>
    </body>
</html>