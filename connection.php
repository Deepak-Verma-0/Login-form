<?php
$conn=mysqli_connect("localhost","root","","login");

if($conn===false){
    die("Error: could not connect". mysqli_connect_error());
}
?>