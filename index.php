<?php
include '../includes/dbConnection.php';
$conn = getDatabaseConnection("nfl");  #Still needs to be created

$status = $_GET['status']; // Player status either active or inactive
$hall = $_GET['hall'];   // Filter Hall of fame results to get that dates between certain years
$wins = $_GET['wins'];  // Filter by amount of Super Bowl Wins
$order = $_GET['order'];  // Order Team Name by ascending or descending

function catalog(){  
    global $status, $hall, $wins, $order;
    
    
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" href="css/style.css" tyype="text/css" />
    </head>
    <body>
        <main>
            <h1>Online Catalog</h1>
            <fieldset> 
            <legend> Search Results</legend>
            <form method="GET">
                <!-- 2) Users can filter data using at least three fields (10 points) -->
                <!-- 3) Users can sort results (asc,desc) using at least one field (10 points) -->
                Player Status - <input type="radio" name="status" value="active"> Active
                <input type="radio" name="status" value="inactive"> Inactive
                <br/>
                Hall of Fame - 
                <select name="hall">
                  <option value=""> - Select One - </option>
                  <option value="sixty">1960</option>
                  <option value="seventy">1970</option>
                  <option value="eight">1980</option>
                  <option value="ninty">1990</option>
                  <option value="twenty">2000</option>
                </select>
                <br/>
                Super Bowl Wins - 
                <select name="wins">
                  <option value=""> - Select One - </option>
                  <option value="none">None</option>
                  <option value="most">Most Wins</option>
                  <option value="topthree">Top 3</option>
                  <option value="least">Least Wins</option>
                </select>
                <br/>
                Order of Teams - <input type="radio" name="order" value="ascending"> Ascending
                <input type="radio" name="order" value="descending"> Descending
                <br/>
                <input type="submit" value="Filter!" name="submitForm"/>
                
            </form>
            </fieldset>
            
            <?php
            if(isset($_GET['submitForm'])){
                catalog();
            }
            
            ?>
            
            <!-- 4) Users can click on an item to get further info (10 points) -->
            
            <p>Go to Shopping Cart</p>
            <form>
                <!-- 5) Users can add items to shopping cart using a Session (10 points)-->
                <!-- 6) Users can see the content of the shopping cart (10 points) -->
            </form>
            
        </main>
    </body>
</html>