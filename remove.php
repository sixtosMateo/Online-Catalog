<?php
//check that the session is active
include "../../includes/dbConnection.php";
$dbConn = getDatabaseConnection('nfl');

$sql = "DELETE FROM players
        WHERE firstName = " . $_GET['firstName']. " and lastName ="  . $_GET['lastName'];

$statement = $dbConn->prepare($sql);  
$statement->execute();


    echo "Delete was confirm!";
    header("Location: addCart.php");
      
    





?>