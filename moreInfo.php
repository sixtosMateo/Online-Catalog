<?php
session_start();
//check that the session is active
include "../../includes/dbConnection.php";
$dbConn = getDatabaseConnection("nfl");

$item = $_SESSION['cart'];
print_r($item);


// $sql="SELECT * 
//             FROM players 
//             WHERE concat(firstName, lastName) like". $item[] ;

// $statement = $dbConn->prepare($sql);  
// $statement->execute();
// $records = $statement->fetchAll(PDO::FETCH_ASSOC);


//     foreach($records as $record){
        
//         echo $record;
//     }
      


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" href="css/style.css" tyype="text/css" />
    </head>
    <body>
        <main>
            <h1>Trading Card Items: </h1>
        
           
           
           
        </main>
    </body>
</html>