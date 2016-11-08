<?php
session_start();
include '../../includes/dbConnection.php';
$dbConn = getDatabaseConnection("nfl");  #Still needs to be created

$status = $_GET['status']; // Player status either active or inactive
$hall = $_GET['hall'];   // Filter Hall of fame results to get that dates between certain years
$wins = $_GET['wins'];  // Filter by amount of Super Bowl Wins
$order = $_GET['order'];  // Order Team Name by ascending or descending


function statusFilter(){
   global $status; 
   global $dbConn;
   if(!empty($status)){
        if($status == "active"){
            echo "<h2>Active Players</h2>";
            
            $sql = "SELECT *
            FROM `players`
            WHERE status = 'active'";
 
        }
        if($status == "inactive"){
            echo "<h2>Inactive Players</h2>";
            $sql = "SELECT *
            FROM `players`
            WHERE status = 'inactive'";
        }
        
        $statement= $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchALL(PDO::FETCH_ASSOC);
        
        echo "<table border = 1>";
        echo "<th></th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Team</th>";
        echo "<th>Position</th>";
        echo "<th>Status</th>";
        foreach($records as $record) {
              echo "<tr>";
              echo "<td>" . "<input type='checkbox' name = 'cart[]' value=". $record['firstName'] . $record['lastName'] .">" . "</td>";
              echo "<td>" . $record['firstName'] . "</td>". "<td>" .  $record['lastName'] . "</td>". "<td>" . $record['team'] . "</td>" .  "<td>" . $record['position'] . "</td>". "<td>" . $record['status'] . "</td>";
             echo "</tr>";
          }
        echo "</table>";
    }
}

function hallFilter(){
    global  $hall;
    global $dbConn;
    if(!empty($hall)){
        //sixty 1960-1969
        echo "<h2>Hall of Fame</h2>";
        if($hall == "sixty"){
            $sql = "SELECT *
            FROM `hall_of_fame`
            WHERE yearInducted
            BETWEEN 1960
            AND 1969 ";
            
        }
        //seventy 1970 - 1979
        if($hall == "seventy"){
            $sql = "SELECT *
            FROM `hall_of_fame`
            WHERE yearInducted
            BETWEEN 1970
            AND 1979 ";
            
        }
        //eighty 1980 - 1989
        if($hall == "eighty"){
            $sql = "SELECT *
            FROM `hall_of_fame`
            WHERE yearInducted
            BETWEEN 1980
            AND 1989 ";
            
        }
        //ninty 1990 - 1999
        if($hall == "ninty"){
            $sql = "SELECT *
            FROM `hall_of_fame`
            WHERE yearInducted
            BETWEEN 1990
            AND 1999 ";
            
        }
        //twenty 2000 - 3000
        if($hall == "twenty"){
            $sql = "SELECT *
            FROM `hall_of_fame`
            WHERE yearInducted
            BETWEEN 2000
            AND 3000 ";
            
        }
        $statement= $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchALL(PDO::FETCH_ASSOC);
        
        echo "<table border = 1>";
        echo "<th></th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Team</th>";
        echo "<th>Position</th>";
        echo "<th>Year Inducted</th>";
        foreach($records as $record) {
              echo "<tr>";
              echo "<td>" . "<input type='checkbox' name = 'cart[]' value=". $record['firstName'] . $record['lastName'] .">" . "</td>";
              echo "<td>" . $record['firstName'] . "</td>". "<td>" .  $record['lastName'] . "</td>". "<td>" . $record['team'] . "</td>" .  "<td>" . $record['position'] . "</td>". "<td>" . $record['yearInducted'] . "</td>";
             echo "</tr>";
          }
        echo "</table>";
    }
     
}

function winsFilter(){
    global  $wins,$dbConn;
    if(!empty($wins)){
        echo "<h2>Super Bowl - Winning Teams </h2>";
        
        if($wins == "none"){
            $sql = "SELECT *
            FROM `teams`
            WHERE superBowlWins = 0
            ORDER BY teamName ASC ";
        }
        if($wins == "most"){
            $sql = "SELECT *
            FROM `teams`
            ORDER BY superBowlWins DESC
            LIMIT 1 ";
        }
        if($wins == "topthree"){
            $sql = "SELECT *
            FROM `teams`
            ORDER BY superBowlWins DESC
            LIMIT 3 ";
        }
        if($wins == "least"){
            $sql = "SELECT *
            FROM `teams`
            WHERE superBowlWins <1
            ORDER BY teamName ASC ";
        }
        $statement= $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchALL(PDO::FETCH_ASSOC);
        
        echo "<table border = 1>";
        echo "<th></th>";
        echo "<th>Team Name</th>";
        echo "<th>Coach</th>";
        echo "<th>Super Bowl Wins</th>";

        foreach($records as $record) {
              echo "<tr>";
              echo "<td>" . "<input type='checkbox' name = 'cart[]' value=". $record['teamName'] .">" . "</td>";
              echo "<td>" . $record['teamName'] . "</td>". "<td>" .  $record['coach'] . "</td>". "<td>" . $record['superBowlWins'] . "</td>";
             echo "</tr>";
          }
        echo "</table>";
    }
}



function orderFilter(){  
    global  $order;
    global $dbConn;
    

    if(!empty($order)){
        echo "<h2>Teams </h2>";
        if($order == "ascending"){
            $sql = "SELECT *
            FROM `teams`
            ORDER BY teamName ASC ";
        }
        if($order == "descending"){
            $sql = "SELECT *
            FROM `teams`
            ORDER BY teamName DESC ";
            
        }
        $statement= $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchALL(PDO::FETCH_ASSOC);
        // teamName 	homeTown 	wins 	losses 	ties 	coach 
        echo "<table border = 1>";
        echo "<th></th>";
        echo "<th>Team Name</th>";
        echo "<th>Coach</th>";
        echo "<th>Home Name</th>";
        echo "<th>Wins</th>";
        echo "<th>Losses</th>";
        echo "<th>Ties</th>";
        
        
        foreach($records as $record) {
              echo "<tr>";
              echo "<td>" . "<input type='checkbox' name = 'cart[]' value=". $record['teamName'] .">" . "</td>";
              echo "<td>" . $record['teamName'] . "</td>". "<td>" .  $record['coach'] . "</td>". "<td>" . $record['homeTown'] . "</td>" .  "<td>" . $record['wins'] . "</td>". "<td>" . $record['losses'] . "</td>" . "<td>" . $record['ties'] . "</td>";
             echo "</tr>";
          }
        echo "</table>";
    }
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
            <h1>NFL Trading Cards</h1>
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
                  <option value="eighty">1980</option>
                  <option value="ninty">1990</option>
                  <option value="twenty">2000</option>
                </select>
                <br/>
                Super Bowl Wins - 
                <select name="wins">
                  <option value=""> - Select One - </option>
                  <option value="none">No Wins</option>
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
        
            
            <!-- 4) Users can click on an item to get further info (10 points) -->
            <br> <br>
            <form method="GET" action="addCart.php" class="continue">
                <!-- 5) Users can add items to shopping cart using a Session (10 points)-->
                <?php
                    if(isset($_GET['submitForm'])){
                       
                       if(!empty(isset($_GET['status']))){
                           statusFilter();
                       }
                       
                       if(!empty(isset($_GET['hall']))){
                           hallFilter();
                       }
                       
                       if(!empty(isset($_GET['wins']))){
                           winsFilter();
                       }
                       
                        if(!empty(isset($_GET['order']))){
                            orderFilter();
                       }
                        
                    }
                    
                ?>
                <input type="submit" name ="submit" value="Continue"/>
                <!-- 6) Users can see the content of the shopping cart (10 points) -->
                
             
                
            </form>
            <br> <br>
            <hr>
            <h3>Documentation: </h3>
             <ul>
              <li><a href="../Online-Catalog/documentation/userStory.doc">User Story</a></li>
              <li><a href="../Online-Catalog/documentation/databaseSchema.JPG">Database Schema</a></li>
              <li><a href="../Online-Catalog/documentation/mockUp.JPG">Mock Up</a></li>
            </ul> 
        </main>
    </body>
</html>