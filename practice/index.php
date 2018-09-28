<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <?php
            $name[] = $_POST["name"];
            $select = $_POST["select"];
            for($i=0; $i<5; $i++){
                echo "<input type='radio' name = 'select'>";
                echo "<input type='text' name = 'name[$i]'><br>";
            }
            
            ?>
            
            <br/><br/>
            <input type="submit" value="Save" onclick="displayData()"/>
        </form>

        <?php
            
        
        ?>
    </body>
</html>