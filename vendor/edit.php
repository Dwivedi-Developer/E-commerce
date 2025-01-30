<?php
$pid = $_GET['pid'];
include "../shared/authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$get_data = mysqli_query($conn, "select * from product where pid=$pid");
$row = mysqli_fetch_assoc($get_data);
$pid = $row['pid'];
$name = $row['name'];
$price = $row['price'];
$details = $row['details'];
$imgpath = $row['imgpath'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-start mt-3 vh-100">
        <form enctype="multipart/form-data" action="" class="w-50 p-3 bg-info" method="POST">

            <input class=" form-control mt-3 " type="text" name="name" id="" value="<?php echo $name ?>" placeholder="Product Name" required="required">
            <input class=" form-control mt-3 " type="text" name="price" id="" value="<?php echo $price ?>" placeholder="Price">
            <textarea class=" form-control mt-3 " name="details" id="" cols="20" rows="5" placeholder="Details:"><?php echo $details ?></textarea>
            <div class="d-flex"><input class=" form-control mt-3 " type="file" name="pdtimg" src = "<?php echo $imgpath ?> ">
                <img class=" mt-3" src="<?php echo $imgpath ?>" alt="">
            </div>
            <div class="text-center mt-2 w-50 m-auto"><input type="submit" name="newupdate" value="Update" class="btn-success px-3 mb-3" </div>
        </form>
    </div>
</body>

</html>
<?php

if (isset($_POST['newupdate'])) {
    $tmp_path = $_FILES['pdtimg']['tmp_name'];
    date_default_timezone_set("Asia/Kolkata");
    $filename = "..//shared/images/" . $userid . date('dMY_H_i_s') . ".jpg";
    $pid = $_GET['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $imgpath = $_FILES['pdtimg'];
    move_uploaded_file($tmp_path, $filename);
    $update_products = mysqli_query($conn, "UPDATE product SET name='$name' , price= '$price' ,details= '$details', imgpath= '$filename' WHERE pid = $pid");
    
    if ($update_products) {
        echo "<script>alert('Product updated')</script>";
    }
} ?>