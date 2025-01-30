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
include"menu.html";
$userid=$_SESSION['userid'];
include_once "../shared/connection.php";
$sql_result= mysqli_query($conn,"Select * from cart join product on product.pid = cart.pid where userid=$userid and is_ordered=1");
$total_price=0;
while($row=mysqli_fetch_assoc($sql_result))
{   $cartid=$row['cartid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $imgpath=$row['imgpath'];
    $total_price=$total_price + $row['price'];

    echo "<div class = 'mycard'>
          <div>$name</div>
          <div>$price</div>
          <div><img src='$imgpath'></div>
          <div>$details</div>
          <div><a href='delete_cart.php?cartid=$cartid'><button class= 'btn-success'>Cancel</button></a></div>
         </div>";
                 }
     
?>