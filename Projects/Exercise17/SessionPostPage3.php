<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
        <title>Session - Page 3</title>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light session-nav justify-content-start">
            <a class="navbar-brand" href="#">
                <img class="cookie-icon" src="images/cookie.png"/>
                Session</a>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="SessionPostPage1.php">Page 1</a>
                <a class="nav-item nav-link" href="SessionPostPage2.php">Page 2</a>
                <a class="nav-item nav-link active" href="#">Page 3</a>
            </div>
        </nav>
        
        <div class="container mt-5">
            <div id="callout" class="row justify-content-center">
                <?php
                if(empty($_SESSION)){
                    echo "<div class='callout warning rounded m-3 p-3 col-sm-6 mt-4'>";
                    echo "Welcome Guest";
                    echo "<div class='mt-2'>
                            <a href='SessionPostPage1.php'>Login</a>
                            <br>
                          </div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        
        <!-- jQuery, Popper & Bootstrap's JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
    </body>
</html>


