<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $first_name=$_POST['name'];
    $last_name=$_POST['lname'];
    $dob=$_POST['dob'];
    $gender=($_POST['gender']);
    $position=isset($_POST['position']) ? implode(',',$_POST['position']):'';
    $number=$_POST['number'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $image=$_FILES['image']['name'];
    $about=$_POST['about'];

    $flag=false;
    // print_r(  $image);die;

    

    if(empty($first_name)){
        $_SESSION['error']['errfname']="* Enter the Fname.";
        $flag=true;
    }else if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
        $_SESSION['error']['errname'] = "Enter Valid user name";
        $flag = true;
    }


    if(empty($dob)){
        $_SESSION['error']['errdob']="Select Date of Birth.";
        $flag=true;
    }


    if(empty($gender)){
        $_SESSION['error']['errgender']="Select Gender.";
        $flag=true;

    }

    if(empty($position)){
        $_SESSION['error']['errpos']="Chose Position.";
        $flag=true;
    }

    if(empty($number)){
        $_SESSION['error']['errnum']="Enter the Ph. Number.";
        $flag=true;
    }else if (!preg_match('/^[0-9]{10}+$/', $number)) {
        $_SESSION["error"]['errnum'] = 'Enter valid phone';
        $flag = true;
      }


    if(empty($state)){
        $_SESSION['error']['errstate']="Select State.";
        $flag=true;
    }

    
      
    if(empty($state)){
        $_SESSION['error']['errcity']="Select city.";
        $flag=true;
    }
    

    if(empty($state)){
        $_SESSION['error']['errimage']="Chose Photo";
        $flag=true;
    }else if ($_FILES["image"]["size"] > 5000000) {
        $_SESSION["error"]['errphoto'] = "File size is too large.";
        $flag = true;
    }
    
    $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, ['jpg', 'png', 'jpeg', 'gif'])) {
        $_SESSION["error"]['errphoto'] = "Only JPG, PNG, JPEG, and GIF files are allowed.";
        $flag = true;
    }


// ---------------------------------------------------------------------------------------------------------
    if($flag){
        header('location:form.php');
        exit();
    }
// -------------------------------------------------------------------------------------------------------
    
    if(isset($_FILES['image']['name']) && $_FILES['image']['error'] == 0){
        $target_dir="data/";
        $target_file=$target_dir.basename($image);
        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            echo "The file ". htmlspecialchars(basename($image)). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

// --------------------------------------------------------------------------------------------------------

    $sql="INSERT INTO `login_record`(`email` ,`user_name`,  `first_name`, `last_name`, `dob`, `gender`, `position`, `number`,   `state`, `city`, `image`, `about`) VALUES (' $email','$user_name','$first_name','$last_name','$dob','$gender','$position','$number','$state','$city','$image','$about')";

    if(mysqli_query($conn,$sql)){
        echo "Account Create Successfully.";
        header('location:preview.php');
        exit();
    }else{
        echo "ACS Error.";
    }
// --------------------------------------------------------------------------------------------------------
mysqli_close($conn);
}

if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
?>