<?php

include 'connection.php';

$user_name = isset($_GET['user_name']) ? mysqli_real_escape_string($conn, $_GET['user_name']) : null;
$deleted_at = date('Y-m-d H:i:s');

if (!isset($user_name)) {
    echo "Invalid user name.";
    exit;
}

$query = "UPDATE login_record
          SET deleted_at='$deleted_at',status_s='1' 
          WHERE user_name='$user_name'";

if (mysqli_query($conn, $query)) {
    header("Location: preview.php"); 
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
