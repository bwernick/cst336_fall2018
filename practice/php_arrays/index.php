<html>
    <head></head>
    <body>
        <?php
            $weekdays = array();
            $weekdays[] = "M";
            $weekdays[] = "T"; 
            array_push($weekdays,"W"); 
            echo "Displaying values using var_dump:";
            var_dump($weekdays);
            echo "<br><br>";
            echo "Displaying values using print_r:";
            print_r($weekdays);
            
            foreach ($weekdays as $day) {
                echo "<br><br> $day";
            } 
            
            echo "<br><br>Array Explode<br>";
            $weekdays = "M, T, W, R, F";   
            $weekdaysArray = explode(",", $weekdays); 
            print_r($weekdaysArray);
            
            echo "<br><br>Array Implode<br>";
            $weekdaysArray = array("M","T", "W", "R", "F");   
            $weekdays =  implode("-*-", $weekdaysArray); 
            print($weekdays);

        ?>    
        
    </body>
    
</html>