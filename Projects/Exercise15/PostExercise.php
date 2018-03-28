<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom CSS -->
        <style>
            .callout {
                border: 1px solid #eee;
                border-left-width: 5px;
            }
            
            .warning {
                border-left-color: #f0ad4e;
            }
            
            .info {
                border-left-color: #5bc0de;
            }
        </style>
        
        <title>HTTP POST</title>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" class="mt-5 mb-5 col-sm-4">
                <h1 class="h3 mb-3 font-weight-normal">Please provide your details</h1>
                <div class="form-group">
                    <label for="username" class="pr-2">Username:</label>
                    <input  type="text" id="username" name="username" class="form-control form-control-sm" placeholder="HarryPotter" required autofocus/>
                </div>
                <div class="form-group">
                    <label for="email" class="pr-2">Email:</label>
                    <input  type="email" id="email" name="email" class="form-control form-control-sm" placeholder="harry@hogwarts.co.uk" required/>
                </div>
                <div class="form-group">
                    <label for="birthdate" class="pr-2">Date of Birth:</label>
                    <input  type="date" id="birthdate" name="birthdate" class="form-control form-control-sm" placeholder="31/07/1980" required/>
                </div>
                <div class="form-group">
                    <label for="country" class="pr-2">Country:</label>
                    <input  type="text" id="country" name="country" class="form-control form-control-sm" placeholder="United Kingdom" required/>
                </div>
                <input type="submit" value="OK" class="btn btn-primary"/>
            </form>

        <?php
        if (!empty($_POST)) {
            echo "<div class='callout info rounded m-3 p-3 col-sm-6'>"
            . "<h5 class='text-info'>Welcome ", $_POST['username'], "</h5>"
            . "<p class='mb-2'>Your email is ", $_POST['email'], "</p>"
            . "<p class='mb-2'>You were born on the "
            . date_format(date_create($_POST['birthdate']), "d/m/Y") . "</p>"
            . "<p class='mb-0'>You live in ", $_POST['country'], "</p></div>";
        } else {
            echo "<h5 class='callout warning rounded m-3 p-3 col-sm-6'>"
            . "You have not submitted any data to the server</h4>";
        }
        ?>
    
        </div>
        <!-- Bootstrap, jQuery & Popper.js -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
