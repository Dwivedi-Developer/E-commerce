<?php 
    include "menu.html";
    $pid=$_GET['pid'];
    
    session_start();
    $userid=$_SESSION['userid'];

    include_once "../shared/connection.php";
    $sql_status = mysqli_query($conn, "SELECT *FROM cart WHERE pid = '$pid' and userid='$userid'");
$row_count = mysqli_num_rows($sql_status);
if ($row_count) {
    
    $status=mysqli_query($conn,"update cart set quant=quant+1 where pid=$pid");
    echo "<div><h1>Already Added!</h1></div>
          <a href='view_cart.php'><button class='btn-primary'>BACK TO CART</button></a>";

    }
else{
    $status = mysqli_query($conn,"insert into cart(userid,pid) values($userid ,$pid)");
    if($status)
    {
        echo "<div><h1>Product added to cart successfully</h1></div>";
        $status=mysqli_query($conn,"update cart set quant=1 where pid=$pid");
        
    }}
?>