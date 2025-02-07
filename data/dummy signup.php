<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }
    </style>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<form method="POST" action="signup_db.php">
    <div class="container-fluid   main">
        
            <div class="row  " style="width: 300px;">
                <div class="col border border-dark rounded-top bg-warning p-2 ">
                    <div class="col">
                        <h4 class="text-center fw-bold fs-2">Create Account</h4>
                        <p class="text-center  ">Its free and hardly takes more then 30s.</p>
                    </div>
                    <div class="col ">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="user_name" placeholder="   User Name" class="form-control">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="c_password" placeholder="Password" class="form-control">
                        </div>
                        <br>

                        <button type="submit" name="submit" 
                            class="submit form-control btn btn-primary">Create Acoount </button><br>
                    <br>
                    <div class="col text-center">
                        <p>By Clicking the Sign Up button you agree to our Terms & condition and privacy policy</p>
                    </div>
                </div>
            </div>
        
    </div>
 </form>



</body>

</html>