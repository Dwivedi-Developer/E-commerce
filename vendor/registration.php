<?php
$name=$_POST['uname'];
$upass1=$_POST['upass1'];
$upass2=$_POST['upass2'];
if($upass1 != $upass2){
    echo "Password Mismatch";
}

include_once "../shared/connection.php";

$sql_result = mysqli_query($conn,"SELECT *FROM users WHERE username='$name'");
$row_count = mysqli_num_rows($sql_result);
if($row_count > 0){
    echo "Username already exists";
    die;
}
$query= "insert into users(username , password, user_type) values('$name','$upass2','vendor')";
$status = mysqli_query($conn , $query);

if ($status){
    echo "Registration Successfull!";
}else{
    "Error in Registration";
    echo "msqli_error($conn)";
}