<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div id="main">
        <?php
            include 'inc/functions.php';
            pullSound();
            play();
        ?>
        
        
        <form>
            <input type="submit" value="Spin!"/>
        </form>
        </div>
    </body>
</html>