<?php
    $backgroundImage = "img/sea.jpg";
    
    //API call
    
    if(!isset($_GET['catagory']) && !isset($_GET['keyword'])){
        
    }
    
    if(isset($_GET['catagory']) && !isset($_GET['keyword'])){
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['catagory'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    if(isset($_GET['keyword'])){
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
        
        <title>Image Carousel</title>
    </head>
    <body>
        <br>
        <?php
            if(!isset($imageURLs)){
                echo "<h2>Type a keyword to display a slideshow<br>with random images from Pixabay.com</h2>";
            }else{
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 5; $i++){
                        echo "<li data-target='#carousel-example-generic' data-slide-to='" . $i . "'"; 
                        echo ($i==0)?'class="active"': "";
                        echo '></li>';
                    }
                ?>
            </ol>
            
            <!--Img Wrapper-->
            <div class="carousel inner" role="listbox">
                <?php
                    //image carousel display
                    for($i = 0; $i < 5; $i++){
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        
                        echo "<div class='item";
                        echo ($i==0)?" active": "";
                        echo "'>";
                        echo "<img src='" . $imageURLs[$randomIndex] . "'>";
                        echo "</div>";
                        
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <!--Controls-->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        
        </div>
        <?php
            }//end else 
        ?>
        <br>
        
        <form method="get">
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal"/>
            <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical"/>
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            <select name="catagory">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountain</option>
                <option value="snow">Snow</option>
                <option value="otter">Otters</option>
            </select>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>