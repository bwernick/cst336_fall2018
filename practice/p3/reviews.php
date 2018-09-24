<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");

function getRandomMovies(){
    global $posters;
    $randomPoster = array();
    for($i=0;$i<4;$i++){
        $temp = rand(0,count($posters)-1);
        $randomPoster[$i] .= $posters[$temp];
        array_splice($posters, $temp, 1);
    }
    sort($randomPoster);
    return $randomPoster;
}

function movieReviews($randPoster) {

    $title = str_replace("_", " ", $randPoster);
    $title = ucwords($title);
    echo "<div class='poster'>";
    echo "<h2> $title </h2>";  //
    echo "<img width='100' src='img/posters/$randPoster.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    $totalReviews = rand(100,300); 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100
    $sum = 100;
    
    //random numbers
    if($randPoster == "ready_player_one"){
        $n1=round(rand(75,90));
    }else{
        $n1=round(rand(1,round($sum/2)));
    }
    $sum -= $n1;
    $n2=round(rand(1,round($sum/2)));
    $sum -= $n2;
    $n3=rand(1, round($sum/1.5));
    $sum -= $n3;
    $n4=$sum;
    
    $ratings = array($n4, $n2, $n3, $n1);

    
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $overallRating = displayRatings($totalReviews,$ratings);
    
    //NOTE: The number of stars should be the rounded value of $overallRating
    echo "<br>";
    for($i=0;$i< round($overallRating); $i++){
        echo "<img src='img/star.png' width='25'>";    
    }
    
    
    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
    return $overallRating;
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                text-align:center;
                color:white;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
            
            html{
                background-image: url("img/bg.jpg");
                z-index: -1;
            }
            
            html ::after {
                 background-color: rgba(135,135,135,0.5);
            }
        
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             $randomPoster  = getRandomMovies();
             $maxRating = 0;
             $best;
             for($i=0;$i<4;$i++){
                $rate = movieReviews($randomPoster[$i]);
                if($rate > $maxRating){
                    $maxRating = $rate;
                    $best = $randomPoster[$i];
                }
                    
             }
             
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       <?php
        $title = str_replace("_", " ", $best);
        $title = ucwords($title);
        echo "<div class='poster'>";
        echo "<h2> $title </h2>";  //
        echo "<img width='100' src='img/posters/$best.jpg'>";    
       ?>
    </body>
</html>