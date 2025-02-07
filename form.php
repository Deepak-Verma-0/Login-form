<?php
session_start();
include 'connection.php';
// print_r( $_SESSION['login_type']);die;
// print_r( $_SESSION['login_type']);die;
if(!isset( $_SESSION['login_type'])  && $_SESSION['login_type'] !='admin' ){
    header('location:index.php');
    exit();
}


$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .error{
            color: wheat;
            background-color: black;
       
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<form action="form_db.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid contain ">

            <div class="row">
                <div class="col">
                    <h3 class="text-center fw-bold">Personal Information</h3>
                </div>
            </div>
            
            <div class="row">
                <label for="username">User Name</label>
                <div class="col">
                    <input type="text" class="username form-control" name="user_name" value="<?php  echo $user_name; ?>" readonly>

               
                </div>
            </div><br>

            <div class="row">
                <label for="name"> Name: </label>   
                <div class="col">
                    <input type="text" name="name" id="name" class="form-control" placeholder="First Name">
                </div>
                <div class="col">
                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errfname'])){
                            echo $_SESSION['error']['errfname'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>
            <br>

            <div class="row">
                <label for="dob"> Date of Birth: </label>   
                <div class="col">
                    <input type="date" name="dob" id="dob" class="form-control" >
                </div> 
            </div>
            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errdob'])){
                            echo $_SESSION['error']['errdob'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>
            <br>
            

            <div class="row">
                <div class="col-3">
                    <label for="gender"> Gender: </label>   
                    <div class="col">
                        <input type="radio" name="gender" id="gender" value="Male"  class="" > Male
                        <input type="radio" name="gender" id="gender"  value="Female" class="" > Female
                    </div>
                </div>

                <div class="col-6">
                    <label for="role">Position:</label>
                    <div class="col">
                        <input type="checkbox" name="position[]" id="position" value="Frontend Developer"> Frontend Developer
                        <input type="checkbox" name="position[]" id="position" value="Backend Developer" > Backend Developer
                    </div>  
                </div>


                <div class="col">
                    <label for="number">Phone Number</label>
                    <input type="tel" name="number" id="number" class="form-control">
                </div>
            </div>

            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errgender'])){
                            echo $_SESSION['error']['errgender'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>
               &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errpos'])){
                            echo $_SESSION['error']['errpos'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>
                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;
                <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errnum'])){
                            echo $_SESSION['error']['errnum'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>

            <div class="row">
                <label for="email"> Email: </label>   
                <div class="col">
                    <input type="email" name="email" id="email" class="form-control" value="<?php  echo $email; ?>" readonly>
                </div>
            </div><br>

            <div class="row">
                <label for="password"> Password: </label>   
                <div class="col">
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>" readonly>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                <label for="state" > State: </label>   
                <select class="form-control" name="state">
                    <option ></option>
                    <option name="state" id="state" value="U.P.">U.P.</option>
                    <option name="state" id="state"  value="M.P.">M.P.</option>
                </select>
                </div>
                <div class="col">
                <label for="city"  > City: </label>   
                <select class="form-control" name="city">
                    <option ></option>
                    <option name="city" id="city" value="Lucknow">Lucknow</option>
                    <option name="city" id="city" value="Kanpur">Kanpur</option>
                </select>
                </div>     
            </div>
            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errstate'])){
                            echo $_SESSION['error']['errstate'];
                        }else{
                            echo '';
                        }
                    ?>
            </span>
            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp;&emsp; 
            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errcity'])){
                            echo $_SESSION['error']['errcity'];
                        }else{
                            echo '';
                        }
                    ?>
            </span>

            <br>

            <div class="row">
                <div class="col">
                    <label for="image"> Image: </label>   
                    <div class="col">
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                </div>
        
                <!-- <div class="col">
                    <img src="" width="100px" height="100px" class="">
                </div> -->
            </div>
            <span class="error">
                    <?php
                        if(isset($_SESSION['error']['errimage'])){
                            echo $_SESSION['error']['errimage'];
                        }else{
                            echo '';
                        }
                    ?>
                </span>
            <br>

            <div class="row">
                <div class="col">
                <label for="about">About: </Label>
                    <textarea cols="20" row="5" id="about" name="about" class="form-control"></textarea>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button>
                </div>
                <div class="col">
                    <button type="reset" class="form-control btn btn-danger" value="reset">Reset</button>
                </div>
            </div>



        </form>
        
    </div>
    <div class="m-4"></div>




</body>

</html>
<?php
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
?>