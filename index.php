<?php
include '../includes/dbConnection.php';
$conn = getDatabaseConnection("project");  #Still needs to be created

function catalog(){  
    
}
function isFormValid(){
    
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 2</title>
    </head>
    <body>
        <main>
            <h1>Online Catalog</h1>
            
            <p>Filter Results</p>
            <form>
                <!-- 2) Users can filter data using at least three fields (10 points) -->
                <!-- 3) Users can sort results (asc,desc) using at least one field (10 points) -->
                
            </form>
            
            <?php
            # 4) Users can click on an item to get further info (10 points) 
            if(isFormValid()){
                catalog();
            }
            
            ?>
            
            <p>Go to Shopping Cart</p>
            <form>
                <!-- 5) Users can add items to shopping cart using a Session (10 points)-->
                <!-- 6) Users can see the content of the shopping cart (10 points) -->
            </form>
            
        </main>
    </body>
</html>