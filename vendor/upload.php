<?php 
session_start();
$userid=$_SESSION['userid'];
// print_r($_POST);
// print_r($_FILES);


$tmp_path=$_FILES['pdtimg']['tmp_name'];
date_default_timezone_set("Asia/Kolkata");
$filename ="..//shared/images/".$userid.date('dMY_H_i_s').".jpg";

move_uploaded_file($tmp_path,$filename);
include_once "../shared/connection.php";
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$query="insert into product(name, price ,details, imgpath, uploaded_by) values('$name',$price,'$details','$filename','$userid')";
$status=mysqli_query($conn, $query);
if($status){
    echo 'Product uploaded Successfully';
}
else{
    echo 'failed to upload the product';
    echo mysqli_error($conn);
}
