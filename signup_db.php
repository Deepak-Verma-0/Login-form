<?php
session_start();

include 'connection.php';

if(isset($_POST['submit'])){
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];

    $login=$_POST['log_email'];
    $log_password=$_POST['log_password'];

    // print_r( $password);die;

    $flag=false;




    if(empty($user_name)){
        $_SESSION['error']['errname']="* Enter User Name.";
        $flag=true;
    }else if(!preg_match("/^[a-zA-Z-' ]*$/", $user_name)) {
        $_SESSION['error']['errname'] = "Enter Valid user name";
        $flag = true;
    }

    if(empty($email)){
        $_SESSION['error']['erremail']="* Enter the email";
        $flag=true;
    }else if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        $_SESSION["error"]['erremail'] = "Enter valid email";
        $flag = true;
    }


    if(empty($password)){
        $_SESSION['error']['errpass']="* Enter Password";
        $flag=true;
    }else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
        $_SESSION["error"]['errpass'] = 'Enter valid password';
        $flag = true;
      }
    


      if($password != $c_password){
        $_SESSION['error']['c_errpass']="Password not match.";
        $flag = true;
      }




      







    if($flag) {
        header("Location: index.php"); 
        exit();
    }



    $sql="INSERT INTO `user_record`(`user_name`,`email`,`password`,`status`) VALUES ('$user_name','$email','$password','1')";

    if(mysqli_query($conn,$sql)){
        $_SESSION['user_name'] = $user_name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        echo "Account Create Successfully.";
        header('location:form.php');
        exit();
    }else{
        echo "ACS Error.";
    }

mysqli_close($conn);
}



?>