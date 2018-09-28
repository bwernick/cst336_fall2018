<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title> </title>
    </head>
    <body>
        <?php
            //Created by Bradley Wernick
        
            //associative array of all dice
            $dice = array("d4" => array("numRolls" => 0, "maxValue" => 4), "d6" => array("numRolls" => 0, "maxValue" => 6), "d8" => array("numRolls" => 0, "maxValue" => 8), 
                          "d10" => array("numRolls" => 0, "maxValue" => 10), "d12" => array("numRolls" => 0, "maxValue" => 12), "d20" => array("numRolls" => 0, "maxValue" => 20));
            
            function showDice(){    //show img of each dice
                global $dice;
                
                echo "<div class='diceImg'>";
                foreach($dice as $key => $value){
                    echo "<img src='img/$key.png' alt='$key' class='single'>";
                }
                echo "</div>";
            }
            
        ?>
        <div id="pageTop">
            <img src="img/dicebag.png" alt="Dice Bag" id="multiple">
            <h1>Dice Roller</h1>
        </div>
        
         <?php
            showDice();
        ?>
        
        <div id="formDiv">
            <form action="roll.php" method="post">
                d4:  
                <input type="number" name="d4"/>
                d6:  
                <input type="number" name="d6"/>
                d8:  
                <input type="number" name="d8"/>
                d10: 
                <input type="number" name="d10"/>
                d12: 
                <input type="number" name="d12"/>
                d20: 
                <input type="number" name="d20"/>
                
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
        <?php
            
        ?>
        
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