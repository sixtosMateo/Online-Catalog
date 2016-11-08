<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" href="css/style.css" tyype="text/css" />
    </head>
    <body>
        <main>
            <h1>Thank You for Shopping with Us!</h1>
            <form action="index.php">
                <input type="submit" value="Back to Site!" />
            </form>
        </main>
    </body>
</html>