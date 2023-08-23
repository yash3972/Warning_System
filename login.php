<?php

session_start();
include "db_connect.php";

// the _post and _get are super global variables help to retieve data send to the server
if(isset($_POST['uname']) && isset($_POST['password'])){
// this function help in sanitation and validation process like removing unwanted whitesspaces and returns the input 
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
}

$uname = validate($_POST['uname']);
$password = validate($_POST['password']);

if(empty($uname)){
    header("Location: index.php?error=User name is required");
    exit();
}
if(empty($password)){
    header("Location: index.php?error=Password name is required");
    exit();
}
$sql="SELECT * FROM users WHERE user_name='$uname' AND password ='$password'";

$result = mysqli_query($con ,$sql);

if(mysqli_num_rows($result) ===1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name']===$uname &&  $row['password']===$password){
        echo "logged In!";
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        header("Location:home.php");
        exit();
    }
    else{
        header("Location:index.php?error=Incorrect User Name or Password");
        exit();
    }
}
else{
    header("Location:index.php");
    exit();
}
