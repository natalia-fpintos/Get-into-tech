<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HTTP GET</title>
    </head>
    <body>
        <h1>Testing an HTTP Get Request Using PHP's SuperGlobals</h1>
        <?php
        if (!empty($_GET)) {
            echo "<h2>Welcome ", $_GET['name'], "</h2>"; 
            echo "<h2>Your hobby is: ", $_GET['hobby'], "</h2>";
            echo "<h2>Your pet is called: ", $_GET['pet'], "</h2>";
            echo "<h2>Your favourite food is: ", $_GET['food'], "</h2>";
//            foreach($_GET as $key => $value){
//            echo "<h4>$key has a value of $value</h4>";
//            }
        }
        else{
        echo "<h2>We do not have your name or hobby information</h2>";
        }
        ?>
        <p>There won't be any output if you forget to enter some query parameters such as:</p>
        <h4>?name=Lisa&hobby=Playing the Saxophone</h4>
        <p>to the end of the url.</p>
       
    </body>
</html>
