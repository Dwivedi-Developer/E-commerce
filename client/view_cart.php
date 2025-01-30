<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .mycard {
            width: 200px;
            height: 150px;
            display: inline-block;
            margin-left: 12px;
        }

        img {
            width: 100%;
            height: 80%;
        }
    </style>
</head>

<body>

</body>

</html>
<?php
include "../shared/authguard.php";
include "menu.html";
$userid = $_SESSION['userid'];
include_once "../shared/connection.php";
$sql_result = mysqli_query($conn, "Select * from cart join product on product.pid = cart.pid where userid=$userid and is_ordered=0 ");
$total_price = 0;
while ($row = mysqli_fetch_assoc($sql_result)) {
    $cartid = $row['cartid'];
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $details = $row['details'];
    $imgpath = $row['imgpath'];
    $quant= $row['quant'];
    $total_price = $total_price + $row['price'];
    echo "<div class = 'mycard'>
    <div>$name</div>
    <div>$price</div>
    <div><img src='$imgpath'></div>
    <div>$details</div>
    <div class='btn-danger d-inline'>Quantity=$quant</div>
    <div><a href='delete_cart.php?cartid=$cartid'><button class= 'btn-success'>Remove from Cart</button></a></div>
   </div>";
}
if ($total_price > 0) {
    echo "<div class='mt-2'>
              <div class= 'display-2'>Gross Total = &#8377;$total_price</div> 
              <div><a href='placeorder.php'><button class='btn-danger'>Place Order</button></a></div>
    </div>";
} else {
    echo "<div class='display-2'>Please add items</div>";
}
?>