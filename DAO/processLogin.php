<?php
require('connect.php');
session_start();

//Lấy dữ liệu từ form
$user = $_POST['inputEmailAddress'];
$raw_pass = $_POST['inputPassword'];

//Kiểm tra tích ô nhớ mật khẩu 
$a_check = ((isset($_POST['rememberPasswordCheck']) != 0) ? 1 : 0);

//Truy vấn
$sql = "select * from customer where status = 1 and email='$user'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

//Kiểm tra thông tin tin đăng nhập
if (hash('md5',$staticSalt.$raw_pass.$row['salt'])==$row['password']) {    
    if ($a_check == 1) {
        setcookie($cookie_usr, $user, time() + $cookie_time, '/');
        setcookie($cookie_pas, $raw_pass, time() + $cookie_time, '/');
    } else {
        setcookie($cookie_usr, " ", time() - 3600);
        setcookie($cookie_pas, " ", time() - 3600);
    }

    //Lưu thông tin cần thiết vào session
    $_SESSION['username'] = $user;    
    $_SESSION['name'] = $row['first_name'];
    $_SESSION['type']=$row['type'];
    if($row['type'] == 'ADMIN')
         header('location:../views/admin.php');
    else{
        header('location:../views/admin.php');
    }
} else echo "<script language= 'javascript'>alert('Sai email đăng nhập hoặc mật khẩu!');location.href='../views/login.php';</script>";

mysqli_close($conn);
