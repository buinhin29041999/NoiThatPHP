<?php
require('connect.php');
$ten = $_POST['inputFirstName'];
$ho = $_POST['inputLastName'];
$email = $_POST['inputEmailAddress'];
$raw_pass = $_POST['inputPassword'];
$confirm_pass = $_POST['inputConfirmPassword'];
$create_date = date("Y-m-d");

//Kiểm tra email tồn tại hay chưa Ajax
if(isset($_POST["username"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }  
  
    //check email in db
    $results = mysqli_query($conn,"SELECT email FROM customer WHERE email='$username'");
  
    //return total count
    $username_exist = mysqli_num_rows($results); //total records
  
    //if value is more than 0, username is not available
    if($username_exist) {
        echo '<img src="imgs/not-available.png" />';
    }else{
        echo '<img src="imgs/available.png" />';
    }
  
    //close db connection
    mysqli_close($connecDB);
}

//Sinh ra chuỗi dài 32 ngẫu nhiên
$salt = substr(md5(rand()), 0, 32);

//Sử dụng thêm một salt cố định

$crypt = hash('md5', $staticSalt . $raw_pass . $salt);

//Xử lý đăng ký
$sql = "INSERT into customer (first_name,last_name,email,password,salt,create_at) values ('$ten','$ho','$email','$crypt','$salt','$create_date')";
$check=mysqli_query($conn, $sql);
if($check==1){
    echo "<script language='javascript'>alert('Đăng ký thành công! Xin mời đăng nhập..');location.href='../views/login.php';</script>";
}
else{
    echo "<script language='javascript'>alert('Thất bại!');location.href='../views/register.php';</script>";
}
