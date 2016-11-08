<?php
function cart(){
 session_start(); //You must always use this line to start or resume a session
//print_r($_GET['cart']);

  if (!isset($_SESSION['cart'])) {
     $_SESSION['cart'] = array();  //initializing session variable
  }

$cart = $_GET['cart'];
foreach($cart as $element )
{   
    if (!in_array($element, $_SESSION['cart'])) { //avoid duplicate device Ids
       $_SESSION['cart'][] = $element;
    }
//    echo $element . "<br/>";
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
        </main>
    </body>
</html>