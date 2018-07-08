<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
        <title>Session - Page 1</title>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light session-nav justify-content-start">
            <a class="navbar-brand" href="#">
                <img class="cookie-icon" src="images/cookie.png"/>
                Session</a>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Page 1</a>
                <a class="nav-item nav-link" href="SessionPostPage2.php">Page 2</a>
                <a class="nav-item nav-link" href="SessionPostPage3.php">Page 3</a>
            </div>
        </nav>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <form action="" method="post" class="col-sm-6">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Cookie Monster" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••••" required/>
                    </div>
                    <div class="form-group">
                        <label for="colour">Colour:</label>
                        <input type="text" name="colour" id="colour" class="form-control" placeholder="Blue" required/>
                    </div>
                    <div class="form-group">
                        <label for="animal">Animal:</label>
                        <input type="text" name="animal" id="animal" class="form-control" placeholder="Cat" required/>
                    </div>
                    <input type="submit" value="Login" class="btn btn-warning"/>
                  </form>
            </div>
            <div id="callout" class="row justify-content-center">
                <?php
                if(!empty($_POST)){
                    $_SESSION["username"] = $_POST['username'];
                    $_SESSION["colour"] = $_POST['colour'];
                    $_SESSION["animal"] = $_POST['animal'];
                }
                
                if(!empty($_SESSION)){
                    echo "<div class='callout warning rounded m-3 p-3 col-sm-6 mt-4'>";
                    echo "Welcome " . $_SESSION['username'] . '<br>';
                    echo "You favourite colour is " . $_SESSION['colour'] . '<br>';
                    echo "You favourite animal is " . $_SESSION['animal'] . '<br>';
                    echo "<div class='mt-2'>
                            <a href='SessionPostPage2.php'>Go to Page 2</a>
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