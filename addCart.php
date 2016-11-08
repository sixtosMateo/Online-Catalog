<?php

function cart(){
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); 
}

$cart = $_GET['cart'];
foreach($cart as $element )
{   
    if (!in_array($element, $_SESSION['cart'])) { //avoid duplicate device Ids
       $_SESSION['cart'][] = $element;
    } 
}

foreach($_SESSION['cart'] as $element ) {
    echo "<p>" . $element . "</p>";
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
            <h1>Trading Card Items: </h1>
            <?=cart()?>
            <form action="deleteCart.php">
                <input type="submit" value="Delete Cart!" />
            </form>
            <form action="thankYou.php">
                <input type="submit" value="Finished!" />
            </form>
        </main>
    </body>
</html>