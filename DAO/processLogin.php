<?php
require('connect.php');
session_start();
$user = $_POST['inputEmailAddress'];
$pass = $_POST['inputPassword'];

$a_check = ((isset($_POST['rememberPasswordCheck']) != 0) ? 1 : 0);
$sql = "select * from customer where status = 1 and email='$user' and password='$pass'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
if ($row['type'] == 'ADMIN') {
    if ($a_check == 1) {
        setcookie($cookie_usr, $user, time() + $cookie_time, '/');
        setcookie($cookie_pas, $pass, time() + $cookie_time, '/');
    } else {
        setcookie($cookie_usr, "", time() - 3600);
        setcookie($cookie_pas, "", time() - 3600);
    }
    $_SESSION['username'] = $user;
    $_SESSION['name'] = $row['full_name'];

    header('location:../views_main/admin.php');
} else echo "<script language= 'javascript'>alert('Sai email đăng nhập hoặc mật khẩu!');location.href='../views_main/login.php';</script>";

mysqli_close($conn);
