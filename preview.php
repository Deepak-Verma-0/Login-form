<?php
session_start();
include 'connection.php';
// print_r( $_SESSION['login_type']);die;
if(!isset( $_SESSION['login_type'])  && $_SESSION['login_type'] !='admin' ){
    header('location:index.php');
    exit();

}
if(isset($_SESSION['log_in'])){
    

?>

<div style="width: 100px;height: 50px; background-color:yellow; border:2px solid black;"><h1>Successfully Login</h1></div>

<?php

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>preview form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   

    <style>
        th,td{
            border: 2px solid white;
            padding: 5px;
            color: yellow;
            font-weight: 10px;
            text-align: center;
	    }
        table,th,td{
            border-collapse: collapse;
        }
        body{
            padding: 10px;
            background-image: url("data/preview.jpg");
            background-size:cover ;
        }
        .sr{
            color:wheat;
        }
        .head{
            color: white;
            
        }
        table.alternate tr:nth-child(even) {
            background-color:rgba(58, 50, 222, 0.89);
        }
        img{
            border: 5px solid yellow;
        }
    </style>
</head>

<body>

<?php
    // $query="SELECT user_record.user_name,user_record.email, login_record.first_name,login_record.last_name,  login_record.number,login_record.position,login_record.dob,login_record.gender,login_record.state,login_record.city,login_record.image,login_record.about  
    // FROM login_record
    // INNER JOIN user_record ON login_record.user_name=user_record.user_name WHERE status_s='0';";

    $query="SELECT * FROM login_record WHERE status_s='0';";    

    $result= $conn->query($query);
?>
  <div class="row p-4">
    <div class="col-2"><a href="form.php" class="form-control btn btn-primary fw-bold fs-3">Add Details</a>
    </div>
    <div class="col-8"></div>
    <div class="col-2"><a href="logout.php" class="form-control btn btn-success fw-bold fs-3">Logout</a>
    </div>
</div>

  </div>
    <form>
        
        <table class="alternate">
            <thead>
                <tr>
                    <th class="head">Sr.No.</th>
                    <th class="head">User Name</th>
                    <th class="head">First Name</th>
                    <th class="head">Last Name</th>
                    <th class="head">Date of Birth</th>
                    <th class="head">Gender</th>
                    <th class="head">Position</th>
                    <th class="head">Ph. Number</th>
                    <th class="head">Email</th>
                    <th class="head">State</th>
                    <th class="head">City</th>
                    <th class="head">Photo</th>
                    <th class="head">About</th>
                    <td class="head"><p class="fw-bold text-center">Action</p></td>
                </tr>
            </thead>
            <!-- -------------------------------------------------------------------------- -->
          
            <tbody>
            <?php
                $i=1;
                while($row=mysqli_fetch_array($result)){
                    if($result->num_rows>0){

                
            ?>



                <tr>
                    <th class="sr"><?php  echo  $i  ?></th>
                    <td><?php echo $row["user_name"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["dob"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["position"]; ?></td>
                    <td><?php echo $row["number"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["state"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                    <td><img src="<?php echo 'data/' . trim($row['image']) ?>" alt="Image" width="100" height="100">
                    </td>
                    <td><?php echo $row["about"]; ?></td>
                   
                    <td>
                        <div class="row ">
                            <div class="col">
                                 <button type="submit" name="sumbit" class="form-control btn btn-primary">Edit</button> 
                            </div>
                        </div><br>

                        <div class="col">
                            <button type="button" name="delete">
                             <a href="delete_db.php?user_name=<?php echo $row['user_name']?>" class="form-control btn btn-danger">Delete</a>
                             </button>
                        </div>
                    </td>
                </tr>

            <?php
                }
                $i++;
            }
            
            ?>
            </tbody>
        </table>
    </form>
</body>

</html>


<?php


?>