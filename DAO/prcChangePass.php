<?php
require('connect.php');
session_start();
$current_email = $_SESSION['username'];
if ($_POST['flag'] == 'changePass1') {
    if (isset($_POST['password']))
        $oldPass = $_POST['password'];
    $sql = "select * from customer where status = 1 and email='$current_email'";
    echo $sql;
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if (hash('md5', $staticSalt . $oldPass . $row['salt']) == $row['password']) {
        header("location:../views/changePassword2.php");
    } else header("location:../views/changePassword.php");
    mysqli_close($conn);
} else if ($_POST['flag'] == 'changePass2') {
    $new_raw_pass = $_POST['password'];
    //Sinh ra chuỗi dài 32 ngẫu nhiên
    $salt = substr(md5(rand()), 0, 32);

    //Sử dụng thêm một salt cố định
    $crypt = hash('md5', $staticSalt . $new_raw_pass . $salt);

    //Xử lý đăng ký
    $sql = "UPDATE customer set password = '$crypt', salt = '$salt' WHERE email = '$current_email'";
    mysqli_query($conn, $sql);
    if ($_SESSION['type'] == 'ADMIN')
        header("location:../views/CustomerList.php");
    else header("location:../views/home.php");

    mysqli_close($conn);
}
