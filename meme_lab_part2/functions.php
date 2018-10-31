<?php

include 'database.php';


$dbConn = getDatabaseConnection();


function searchForMemes() {
    global $dbConn; 
    
    $sql = "SELECT 
        all_memes.line1, 
        all_memes.line2, 
        categories.meme_url 
      FROM all_memes INNER JOIN categories 
      ON all_memes.category_id = categories.category_id 
      WHERE 1"; 
    
    if(isset($_POST['search'])) {
      // query the databse for any records that match this search
      $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')";
    } 
    
    if(isset($_POST['meme-type-search']) && !empty($_POST['meme-type-search'])) {
      $sql .= " AND meme_type = '{$_POST['meme-type-search']}'"; 
    }

    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    return $records; 
} 


function displayMemes($records) {
  echo '<div class="memes-container">'; 
    
      
  foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
  }
  
  echo '<div style="clear:both"></div>'; 
  echo '</div>'; 
}

?>
