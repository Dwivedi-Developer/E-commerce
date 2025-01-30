<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .mycard{
            width:200px;
            height:150px;
            display:inline-block;
            margin-left: 12px;
        }
        img{
            width:100%;
            height:80%;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php

include "../shared/authguard.php";
include "menu.html";

$userid=$_SESSION['userid'];
include_once "../shared/connection.php";
$sql_result = mysqli_query($conn,"select * from product");

while($row=mysqli_fetch_assoc($sql_result)){
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];

    echo "<div class = 'mycard'>
          <div>$name</div>
          <div>$price</div>
          <div><img src='$imgpath'></div>
          <div>$details</div>
          <div><a href='cart.php?pid=$pid'><button class= 'btn-success'>Add to Cart</button></a></div>
         </div>";
                 
}


?>
