<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" type="image/x-icon" herf="./data/home.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman';
        }

        #icon {
            width: auto;
            height: 30px;
            cursor: pointer;
        }

        .navbar {
            position: fixed;
            width: 100%;
            height: 50px;
            color: wheat;
            box-shadow: 0px 5px 10px 0px;
            z-index: +1;
            background: transparent;
            overflow: hidden;
        }

        .nav-link:hover {
            background-color: wheat;
            border-radius: 5px;
        }

        .cover {
            width: 100%;
            height: 900px;
            position: fixed;
            overflow: hidden;


        }

        .cover video {
            width: 100%;
            height: auto;
            display: block;
        }

       

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* z-index: 3; */
            overflow: hidden
        }

        .dd {
            overflow: hidden;
        }

        #sign {
            display: none;
            position: relative;
            top: 200px;
            left: 400px;
            justify-content: center;
            align-items: center;
           
        }
        #login {
            /* display: none; */
            position: relative;
            top: 100px;
            left: 50px;
            justify-content: center;
            align-items: center;
           
        }

        .footer {
            
            width: 100%;
            height: 50px;
            background-color: black;

        }
        .error{
            color: yellow;
           
        }
           
    </style>


    <script>
        $(document).ready(function () {
            $("#show").click(function () {
               $("#sign").show();
               $("#login").hide();
            });
        });

        $(document).ready(function(){
            $("#show_login").click(function(){
                $("#login").show();
                $("#sign").hide();
            });
        });
 
    </script>



</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <?php
    // if(isset($_SESSION['Signup'])){
    // echo '';
    // }
    ?>
    <!-- ------------------------------------------------------------------------navbar -->
    <div class="container-fluid ">
        <div class="row navbar ">
            <div class="col-7"><a herf="#"><img src="./data/logo.png" id="icon"></a></div>

            <div class="col-5 d-flex justify-content-between nav">
                <button id="show" class="nav-link "  ><i class="fa-solid fa-user"> </i> Signup</button>
                <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
                <button id="show_login" class="nav-link  hide_login"  ><i class="fa-solid fa-right-to-bracket"></i> Login</button>
            </div>
        </div>
    </div>

    <!-- ---------------------------------Signup------------------------------------------------------- -->
    <div class="col cover ">
        <video src="./data/video.mp4" class="" autoplay></video>
    </div>

<form action="signup_db.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo $row['user_name']?>"
    <div class="container-fluid   main" id="sign">
        <div class="row dd " style="width: 350px;">
            <div class="col border rounded  p-2 z-2 position-relative">
                <div class="col">
                    <h4 class="text-center fw-bold fs-2 z-3 position-relative text-light ">Create Account</h4>
                    <p class="text-center z-3 position-relative  text-light">Its free and hardly takes more then 30s.
                    </p>
                </div>
                <div class="col ">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="user_name" placeholder="   User Name" class="form-control">
                    </div>
                    <span class="error">
                        <?php if(isset($_SESSION['error']['errname'])){
                                    echo $_SESSION['error']['errname']; 
                             }else{
                                echo '';
                             } ?>
                    </span>
                   <br>




                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <span class="error"><?php
                        if(isset($_SESSION['error']['erremail'])){
                            echo $_SESSION['error']['erremail'];
                        }else{
                            echo '';
                        }
                    ?></span>
                    <br>

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <span class="error">
                        <?php
                         if(isset($_SESSION['error']['errpass'])){
                            echo $_SESSION['error']['errpass'];
                        }else{
                            echo '';
                        }
                        ?>
                    </span>
                    <br>

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="c_password" placeholder="Password" class="form-control">
                    </div>
                    <span class="error">
                        <?php
                         if(isset($_SESSION['error']['c_errpass'])){
                            echo $_SESSION['error']['c_errpass'];
                        }else{
                            echo '';
                        }
                        ?>
                    </span>
                    <br>

                    <button type="submit" name="submit"  
                        class="submit form-control btn btn-primary z-3 position-relative">Create Acoount</button><br>
                </div><br>
                <div class="col text-center z-3 position-relative text-light">
                    <p>By Clicking the Sign Up button you agree to our Terms & condition and privacy policy</p>
                </div>
            </div>
        </div>
    </div>
    
</form>

<!-- -----------------------------------------login-------------------------------------------------- -->

<form action="loging_db.php" method="post">
 <div class="container-fluid   main  " id="login">
        <div class="row dd " style="width: 350px;">
            <div class="col border rounded  p-2 z-2 position-relative">
                <div class="col">
                    <h4 class="text-center fw-bold fs-2 z-3 position-relative text-light ">Login Account</h4>
                   
                    <p class="text-center z-3 position-relative  text-light">Don't have account yet? <a href="#"> Signup </a> 
                    </p>
                </div>
                <div class="col ">
                    

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="log_email" placeholder="Email" class="form-control">
                    </div>
                    <span class="error"><?php
                        if(isset($_SESSION['error']['errlog'])){
                            echo $_SESSION['error']['errlog'];
                        }else{
                            echo '';
                        }
                    ?></span>

                    <br>

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="log_password" placeholder="Password" class="form-control">
                    </div>
                    <span class="error"><?php
                        if(isset($_SESSION['error']['errlogpass'])){
                            echo $_SESSION['error']['errlogpass'];
                        }else{
                            echo '';
                        }
                    ?></span>
                    <br>

                    <button type="sumbit" name="submit" 
                        class="form-control btn btn-primary z-3 position-relative">Login</button><br>
                </div><br>
                <div class="col text-center z-3 position-relative text-light">
                    <p>By Clicking the login button you agree to our Terms & condition and privacy policy</p>
                </div>
            </div>
        </div>
    </div> 

</form>








</body>
<?php

if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
?>

</html>