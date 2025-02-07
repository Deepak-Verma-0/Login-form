<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    
    
    $login=$_POST['log_email'];
    $log_password=$_POST['log_password'];
    
    $query="SELECT * FROM user_record WHERE email='$login' AND password='$log_password';";
    
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);

    
    if(empty($login)){
        $_SESSION['error']['errlog']="* Enter the email";
        $flag=true;
    }
    else if($row['email']!=$login){
        $_SESSION['error']['errlog']="Enter the correct Email";
        $flag=true;
    }


    if(empty($log_password)){
        $_SESSION['error']['errlogpass']="* Enter Password";
        $flag=true;
    }
    else if($row['password'] != $log_password){
        $_SESSION['error']['errlogpass']="Enter the correct password";
        $flag=true;
    }

    
    
    
    // print_r( $row);die;



// ----------------------------------------------------------without Login not show preview page -------------------------------------------------------------------------------------------------
    if($row['email']==$login && $row['password']==$log_password){
      
        if($row['login_type']=='admin' || $row['login_type']=='super_admin'){
            $_SESSION['login_type']=$row['login_type'];
            $_SESSION['login_id']=$row['id'];
        //   print_r( $_SESSION['login_id']);die;
            
        header('location:preview.php');
       
            exit();
        }
    }else{
        header('location:index.php');
        exit();
    }

    






    
    // print_r(   $row);die;






    if($flag) {
        header("Location: index.php"); 
        exit();
    }





    if(mysqli_query($conn,$query)){
        echo "Account login Successfully.";
        echo '<script>alert("hello")</script>';
        header('location:preview.php');
        $_SESSION['log_in']='login';
        exit();
    }else{
        echo "ACS Error.";
    }

mysqli_close($conn);
}





if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}

?>