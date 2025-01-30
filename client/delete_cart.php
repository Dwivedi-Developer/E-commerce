<?php

$cartid=$_GET['cartid'];
$quant=$_GET['quant'];
include_once"../shared/connection.php";
 $sql_status = mysqli_query($conn, "SELECT quant FROM cart WHERE cartid=$cartid");

if ($sql_status>1) {
    $cartid=$_GET['cartid'];
    $quant=$_GET['quant'];
    
    $status=mysqli_query($conn,"UPDATE from cart set quant = quant-1 where cartid=$cartid");
    header("location:View_cart.php");}
else{   $status=mysqli_query($conn,"delete from cart where cartid=$cartid");
   if($status){
    echo "Product removed from cart";
    header("location:view_cart.php");
   }}
