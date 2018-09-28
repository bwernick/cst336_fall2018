<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        
        <div id="pageTop">
            <img src="img/dicebag.png" alt="Dice Bag" id="multiple">
            <h1>Dice Roller</h1>
        </div>
        
        <?php
             $dice = array("d4" => array("numRolls" => 0, "maxValue" => 4), "d6" => array("numRolls" => 0, "maxValue" => 6), "d8" => array("numRolls" => 0, "maxValue" => 8), 
                          "d10" => array("numRolls" => 0, "maxValue" => 10), "d12" => array("numRolls" => 0, "maxValue" => 12), "d20" => array("numRolls" => 0, "maxValue" => 20));
        
            
            $dice["d4"]["numRolls"] = $_POST["d4"];
            $dice["d6"]["numRolls"] = $_POST["d6"];
            $dice["d8"]["numRolls"] = $_POST["d8"];
            $dice["d10"]["numRolls"] = $_POST["d10"];
            $dice["d12"]["numRolls"] = $_POST["d12"];
            $dice["d20"]["numRolls"] = $_POST["d20"];
            
            //var_dump($dice);
            showRolls();
    
            
            function showRolls(){
                global $dice;
                $roll = 0;
                foreach($dice as $key => $value){                                 //for each type of dice
                    if($dice[$key]["numRolls"] > 0){
                    echo "<div class ='rollTable'>";
                        echo "<div class='rollRow'>";
                        echo "<div class = 'rollImg'><figure><img src='img/$key.png' alt='$key' class='single'><figcaption><h2>$key</h2></figcaption></figure></div>";
                        
                        for($i=0;$i<$dice[$key]["numRolls"];$i++){          //loop for however many rolls
                                echo "<div class='rollCell'>";
                                $roll = rand(1, $dice[$key]["maxValue"]);       //get the roll
                                echo "<h2>$roll</h2>";                          //display value of roll
                            echo "</div>";
                        }
                        echo "</div>";
                    echo "</div>";
                    }
                }
                
            }
        
        ?>
        
        <div class="return">
            <br><br>
            <a href="<?php echo 'index.php'; ?>">Roll Again?</a>
            <br><br>
        </div>
        
        <br><br><hr><br><br>
        <footer>
            Image Sources: <br>
            <ul>
                <li><a href"https://www.awesomedice.com/">https://www.awesomedice.com/</a></li>
                <li><a href"https://easyrollerdice.com/blogs/rpg/dd-dice">https://easyrollerdice.com/blogs/rpg/dd-dice</a></li>
            </ul>
        </footer>
    </body>
</html>