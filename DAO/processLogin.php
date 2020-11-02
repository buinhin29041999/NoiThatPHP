<?php
require('connect.php');
session_start();

if (isset($_POST['inputEmailAddress']) && isset($_POST['inputPassword'])) {
    $user = $_POST['inputEmailAddress'];
    $pass = $_POST['inputPassword'];
}
$sql = "select * from customer where email='$user' and password='$pass'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

if (isset($row['email']) && isset($row['password'])) {
    $_SESSION['username'] = $user;
    $_SESSION['password'] = $pass;
    header('location:../admin.php');
} else echo "<script language= 'javascript'>alert('Sai email đăng nhập hoặc mật khẩu!');location.href='../login.html';</script>";

mysqli_close($conn);
