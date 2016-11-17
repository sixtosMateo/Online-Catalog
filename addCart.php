<?php
session_start();
include "../../includes/dbConnection.php";
$dbConn = getDatabaseConnection("nfl");



function getSql($e){
    
    global $dbConn;
     $sql="SELECT * 
            FROM `players`";

$statement = $dbConn->prepare($sql);  
$statement->execute();
$records = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($records as $record) {
   $temp = $record['firstName'].$record['lastName'];
    if ($temp ==$e ){
        $info =$record['firstName']. " " . $record['lasstName']. " ".$record['team']. " ". $record['position'] . " ". $record['status'];
    }
}
return $info;

}

function cart(){
   
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); 
}


$cart = $_GET['cart'];
    if(!empty($cart))
    {
    foreach($cart as $element )
    {   
        if (!in_array($element, $_SESSION['cart'])) { //avoid duplicate device Ids
           $_SESSION['cart'][] = $element;
        } 
    }
   
    
    
    foreach($_SESSION['cart'] as $element ) {
        
        
        echo  $element . "<form action='addCart.php' onsubmit='return moreinformation(\"". getSql($element)."\")'>
        <input type='submit' value='More Info'></form><br />";
        
    }   
   
    }
    else{
        header('Location: index.php');
        
    }
    
   
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" href="css/style.css" tyype="text/css" />
         <script>

            function moreinformation(info) {
                
                return confirm(info);
                
            }            
            
        </script>
        
    </head>
    <body>
        <main>
            <h1>Trading Card Items: </h1>
            <?=cart()?>
            <form action="deleteCart.php">
                <input type="submit" value="Delete Cart!" />
            </form>
            <form action="thankYou.php">
                <input type="submit" value="Finished!" />
            </form>
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