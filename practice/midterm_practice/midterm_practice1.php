<?php
    session_start();
?>

<?php
    //checking for non input.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!isset($_POST['month'])){
            echo "<h2>You must select a month</h2>";
        }
        if(!isset($_POST['numLocations'])){
            echo "<h2>You must specify the number of locations</h2>";
        }
    }
    
    if(isset($_POST['close'])){
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Winter Vacation Planner</title>
        <style type="text/css">
            form{
                width: 50%;
                margin: auto;
            }
            
            h1{
                text-align:center;
                font-size: 36px;
                color: black;
            }
            
            h2{
                text-align:center;
                font-size: 36px;
                color: red;
            }
            
            table{
                width:100%;
                text-align:center;
                border: none;
            }
            
            td{
                padding:20px;
            }
            
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Winter Vacation Planner</h1>
        
        <form id="planner" method="post" action="midterm_practice1.php">
            <label for="month">Select Month: </label>
            <select name="month">
                <option>Select</option>
                <option value="november">November</option>
                <option value="december">December</option>
                <option value="january">January</option>
                <option value="febuary">Febuary</option>
            </select>
            <br><br>
            
            <label for="numLocations">Number of Locations: </label>
            <input type="radio" name="numLocations" value="3"/><b>Three</b>
            <input type="radio" name="numLocations" value="4"/><b>Four</b>
            <input type="radio" name="numLocations" value="5"/><b>Five</b>
            <br><br>
            
            <label for="country">Select Country: </label>
            <select name="country">
                <option value="usa">USA</option>
                <option value="mexico">Mexico</option>
                <option value="france">France</option>
            </select>
            <br><br>
            
            <label for="alphaOrder">Visit locations in alphabetical order: </label>
            <input type="radio" name="numLocations" value="0"/><b>A-Z</b>
            <input type="radio" name="numLocations" value="1"/><b>Z-A</b>
            <br><br>
            
            <input type="submit" value="Create Itinerary"/>
        </form>
        
        
        
        <?php
                if(isset($_POST['month']) && isset($_POST['numLocations'])){
                $country = $_POST['country'];
                $numLocations = $_POST['numLocations'];
                $month = $_POST['month'];
                
                $_SESSION['month'] = array();
                $_SESSION['country'] = array();
                $_SESSION['numLocations'] = array();
                
                array_push($_SESSION['month'], $month);
                array_push($_SESSION['numLocations'], $numLocations);
                array_push($_SESSION['country'], $country);

                
                
                if(isset($_POST['alphaOrder'])){
                    $alphaOrder = $_POST['alphaOrder'];
                }
                
                echo "<h1>$month Itinerary</h1><br>";
                echo "Visiting $numLocations places in $country";
                echo "<br><br>";
                
                echo "<table border =\"1\" style='padding:10px'>";
                $p = 1;
                if($month == "november"){
                    $days = 30;
                }elseif($month == "december"){
                    $days = 31;
                }elseif($month == "january"){
                    $days = 31;
                }else{
                    $days = 28;
                }
                
                for($i=1; $i <= $numLocations; $i++){
                    if($country == "usa"){
                        switch ($i){
                            case 1: $img . $i = "chicago";
                            case 2: $img . $i = "hollywood";
                            case 3: $img . $i = "las_vegas";
                            case 4: $img . $i = "ny";
                            case 5: $img . $i = "washington_dc";
                        }
                    }elseif($country == "mexico"){
                        switch ($i){
                            case 1: $img . $i = "acapulco";
                            case 2: $img . $i = "cabos";
                            case 3: $img . $i = "cancun";
                            case 4: $img . $i = "chichenitza";
                            case 5: $img . $i = "huatulco";
                        }
                    }else{
                        switch ($i){
                            case 1: $img . $i = "bordeaux";
                            case 2: $img . $i = "le_havre";
                            case 3: $img . $i = "lyon";
                            case 4: $img . $i = "montpeller";
                            case 5: $img . $i = "paris";
                        }
                    }    
                }
                
                $dayArr = array();
                for($j = 1; $j < $numLocations; $j++){
                    array_push($dayArr, rand(1, $days));    
                }
                sort($dayArr);
                
                for ($row=1; $row <= 5; $row++) { 
                    echo "<tr> \n";
                    for ($col=1; $col <= 7; $col++) {
                        if($p > $days){ break; }
                        if($p == rand(1, $days)){
                            $w = 1;
                            $q = $img.$w;
                            $w+=1;
                            echo "<td><figure><img src='img/$country/$q.png'><figcaption>$img</figcaption></figure></td>";
                        }
                        echo "<td>$p</td> \n";
                        $p++;
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        
        ?>
        
        <br><br>
        <h1>Monthly Itinerary</h1><br>
        <?php
            $m = count($_SESSION['month']);
            for($x = 0; $x < $m; $x++){
                echo "Month: " . $_SESSION['month'][$x] . ", Visiting " . $_SESSION['numLocations'][$x] . " locations in " . $_SESSION['country'][$x] . "<br>";
            }
        ?>
        
        <br><br><br>
        <form method="post" action="midterm_practice1.php">
            <input type="submit" value="Clear Itinerary" name="close" />
        </form>
    
    </body>
</html>