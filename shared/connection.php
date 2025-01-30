<?php
$conn=new mysqli("localhost","root","","dwivedi_2000");
if($conn->connect_error){
    echo "error in connection";
    die;
}
?>