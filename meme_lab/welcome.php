<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
  </head>
  <body>
    <h1>Meme Generator</h1>
    
    <?php
      include 'database.php';
      
      $dbConn = getDatabaseConnection(); 
      $sql = "SELECT * from all_memes"; 
      $statement = $dbConn->prepare($sql); 
      
      $statement->execute(); 
      $memes = $statement->fetchAll(); 
      $display = $memes[rand(0, count($memes))];
      
      $memeURL = $display['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $display["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $display["line2"] . '</h2>'; 
       echo  '</div>'; 
    ?>
    <!--<img height="100px" width="150px" src="https://www.publicdomainpictures.net/pictures/90000/velka/alpaca-chewing.jpg" alt="a-chewing-alpaca">
    -->
    <h3>Welcome to my Meme Generator!</h3>
    
    <form action="meme.php" method="post">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>

        <input type="submit"></input>
    </form>
    
    <a href="./meme.php">View all memes</a>

  </body>
</html>