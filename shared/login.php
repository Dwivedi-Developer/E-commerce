<?php
$username=$_POST['uname'];
$upass1=$_POST['upass1'];

include_once "../shared/connection.php";
session_start();
$_SESSION['login_status']=false;

$sql_result = mysqli_query($conn,"SELECT *FROM users WHERE username='$username' and password='$upass1' ");
$row_count = mysqli_num_rows($sql_result);
if($row_count == 0){
    echo "Invalid Credentials!";
    die;
}

$row= mysqli_fetch_assoc($sql_result);
$userid=$row['userid'];
$name=$row['username'];
$user_type=$row['user_type'];

$_SESSION['login_status']=true;
$_SESSION['userid']=$userid;
$_SESSION['username']=$username;
$_SESSION['user_type']=$user_type;
if($user_type =="vendor"){
    header("location:../vendor/home.php");
}

if($user_type=="customer"){
    header("location:../client/home.php");
}