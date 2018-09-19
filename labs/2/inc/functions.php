<?php
    function displaySymbol($num, $pos){
        switch($num){
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "grapes";
                break;
            case 2: $symbol = "cherry";
               break;
            case 3: $symbol = "lemon";
               break;
        }
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol) . "' width='70'>";
    }
    
    function displayPoints($num1, $num2, $num3){
        echo "<div id='output'>";
        if($num1 == $num2 && $num2 == $num3 && $num1 == $num3){
            switch($num1){
                case 0:
                    $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    jackpotSound();
                    break;
                case 1:
                    $totalPoints = 900;
                    jackpotSound2();
                    break;
                case 2:
                    $totalPoints = 500;
                    jackpotSound2();
                    break;
                case 3:
                    $totalPoints = 250;
                    jackpotSound2();
                    break;
            }
        echo "<h2>You won $totalPoints points!</h2>";
        
        }else{
            echo "<h3>Try Again!</h3>";
        }
        echo "</div>";
    }
    
    function play(){
        for($i=1;$i<4;$i++){
                ${"randomValue" . $i} = rand(0,3);
                displaySymbol( ${"randomValue" . $i}, $i );
            }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
    
    function jackpotSound(){
        echo "<audio volume='0.1' autoplay><source src='audio/jackpot.mp3' type='audio/mpeg'></source></audio>";
    }
    
    function jackpotSound2(){
        echo "<audio volume='0.1' autoplay><source src='audio/jackpot2.mp3' type='audio/mpeg'></source></audio>";
    }
    
    function pullSound(){
        echo "<audio volume='0.1' autoplay><source src='audio/pull.mp3' type='audio/mpeg'></source></audio>";
    }
?>