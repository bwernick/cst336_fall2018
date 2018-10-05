<?php
    // Start the session
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Challenge 2</title>
        
    </head>
    <body>
        <?php
            
            function getRand(){
                $answer = rand(1,100);
                $_SESSION["answer"] = $answer;
            }
            
            function showResult(){
                $answer = $_SESSION["answer"];
                $guess = $_SESSION["guess"];
                if($answer > $guess){
                    echo "<h2>Too High</h2>";
                }else if($answer < $guess){
                    echo "<h2>Too Low</h2>";
                }else{
                    echo "<h2>Correct!</h2>";
                }
            }
            
            function showAttempts(){
                $guess_arr = array();
                $guess_arr = $_SESSION["old_guess"];
                echo "Previous guesses: ";
                for($i=0;$i<count($guess_arr); $i++){
                    echo $guess_arr[$i];
                }
                echo "<br>";
                echo "Number of attempts: " + count($guess_arr);
            }
                    
        ?>
        
        <form method="post">
            <label for="guess">Your Guess: </label>
            <input type="number" name="guess" id="guess"/>
            <input type="submit" value="Submit"/>
        </form>
        
        <?php
            if(isset($_POST["guess"])){
                $guess_arr = array();
                $guess_arr = $_SESSION["old_guess"];
                $guess = $_POST["guess"];               //get user guess from form
                
                $_SESSION["guess"] = $guess;            //save the current guess
                $guess_arr .= $guess;
                $_SESSION["old_guess"] = $guess_arr;    //save all the old guesses
            }
        ?>
        
        <form>
            <input type="submit" value="Start Over" name="giveUp"/>
        </form>
        
        <?php
            if(isset($_POST["giveUp"])){
                session_unset();
                session_destroy();
            }
            
            if(!isset($_SESSION["answer"])){
                getRand();
            }
            
            if(isset($_POST["guess"])){
                showAttempts();
                showResult();
            }
            
            print_r($_SESSION);
        ?>
        
        
    </body>
</html>