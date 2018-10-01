<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style type="text/css">
            #inputForm{
                display: inline-block;
                padding-left: 5%;
                padding-right: 5%;
                padding-bottom:5%;
                border: 1px solid black;
            }
            
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        
        <div id="inputForm">
            <h1>Aces vs Kings</h1>
            
            <?php
                $shuff = array();
                for($i = 0; $i < 52; $i++)
                    $shuff[] = $i;
            
                shuffle($shuff);
                
                
                
                $rows = $_POST["rows"];
                $columns = $_POST["columns"];
                
                
                if(($rows * $columns) > 39){
                    echo "<h1> The product of columns and rows must not exceed 39.</h1>";
                }else{
                    //this should have worked, Luis agreed
                    //array_splice($shuff, $rows * $columns);
                    //sort($shuff);
                    //var_dump($shuff);
                    echo "<table>";
                    $count = 0;
                    $suits = array("clubs", "diamonds", "hearts", "spades");
                    $aceCount =0;
                    $kingCount = 0;
                    
                    for($i=0; $i<$rows;$i++){
                        echo "<tr>";
                        for($j=0; $j<$columns;$j++){
                            $value=($shuff[$count]%13)+1; 
                            $suitnum=(int)($shuff[$count]/13);
                            $count++;
                            if($suitnum == $_POST["omit"]){
                                $j--;
                            }else{
                                if($value == 1){
                                    echo "<td style='background-color:yellow'><img src='cards/$suits[$suitnum]/$value.png'></td>";
                                    $aceCount++;
                                }else if($value == 13){
                                    echo "<td style='background-color:cyan'><img src='cards/$suits[$suitnum]/$value.png'></td>";
                                    $kingCount++;
                                }else{
                                    echo "<td><img src='cards/$suits[$suitnum]/$value.png'></td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    if($rows){
                        echo "Number of Aces: " . $aceCount . "<br>";
                        echo "Number of Kings: " . $kingCount . "<br>";
                        
                        if($aceCount > $kingCount){
                            echo "<h1>Aces win!</h1>";
                        }else if($kingCount > $aceCount){
                            echo "<h1>Kings win!</h1>";
                        }else{
                            echo "<h1>Tie! No winner.</h1>";
                        }
                        
                        echo "<br>";
                        }
                    }
            ?>
            
            
            <form method="post">
            
                <label for="rows">Number of Rows</label>
                <input type="number" name="rows" id="rows"/>
                <br>
                
                <label for="columns">Number of Columns</label>
                <input type="number" name="columns" id="columns"/>
                <br>
                
                <label for="omit">Suit to omit: </label>
                <select name="omit" id="omit">
                    <option value="0">Clubs</option>
                    <option value="1">Diamonds</option>
                    <option value="2">Hearts</option>
                    <option value="3">Spades</option>
                </select>
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
        
        
    </body>
</html>