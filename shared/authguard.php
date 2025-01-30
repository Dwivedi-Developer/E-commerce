<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .user-info{
      display:flex; 
      justify-content:space-around;
    }
  </style>
</head>
<body>
  
</body>
</html>

<?php
  session_start();

  if(!isset($_SESSION['login_status']))
  {
    echo "unauthorized access";
    die;
  }

  if($_SESSION['login_status']==false)
  {
    echo "illegal";
    die;
  }
  $name=$_SESSION['username'];
  $userid=$_SESSION['userid'];
  $user_type=$_SESSION['user_type'];

  echo "<div class='user-info'>
        <div>$userid : $name</div>
        <div>$user_type</div>
        <div>
        <a href='../shared/logout.php'>
        <button>Logout</button></div>
        </div>";
?>