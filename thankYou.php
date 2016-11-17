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
            <br/><br/>
            <hr>
            <h3>Documentation: </h3>
             <ul>
              <li><a href="../Online-Catalog/documentation/userStory.doc">User Story</a></li>
              <li><a href="../Online-Catalog/documentation/databaseSchema.JPG">Database Schema</a></li>
              <li><a href="../Online-Catalog/documentation/mockUp.JPG">Mock Up</a></li>
              <li><a href="https://github.com/sixtosMateo/Online-Catalog">GitHub</a></li>
            </ul> 
        </main>
    </body>
</html>