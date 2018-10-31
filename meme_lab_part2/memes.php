<?php
include 'functions.php'; 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>A Meme</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php include 'navigation.php' ?>

    
    <h1>All memes</h1>
    <form method="post" action="meme.php">
        Search:  <input type="text" name="search"></input> 
        Meme type: <select name="meme-type-search">
          <option value=""></option>
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select> <br/>
        ORDER: 
        <input type="radio"  name="order" value="newest-first"> Newest first
        <input type="radio"  name="order" value="oldest-first"> Oldest first
        <br/>
        <input type="submit"></input>
    </form>
    
    <?php 
      $records = searchForMemes(); 
      displayMemes($records); 
    ?>
    
  </body>
</html>