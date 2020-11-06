<?php
require('connect.php');
session_start();
$user = $_POST['inputEmailAddress'];
$pass = $_POST['inputPassword'];

$a_check = ((isset($_POST['rememberPasswordCheck']) != 0) ? 1 : 0);
if ($a_check == 1) {
    setcookie($cookie_usr, $user, time() + $cookie_time,'/');
    setcookie($cookie_pas, $pass, time() + $cookie_time,'/');

}
// setcookie($cookie_usr, "", time() - 36000);
// setcookie($cookie_pas, "", time() - 36000);
if (!isset($_COOKIE[$cookie_usr])) {
    echo "Cookie named '" . $cookie_usr . "' is not set!";
} else {
    echo "Cookie '" . $cookie_usr . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_usr];
}   


// $sql = "select * from customer where email='$user' and password='$pass'";
// $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
// if (isset($row['email']) && isset($row['password'])) {
//     $_SESSION['username'] = $user;
//     $_SESSION['password'] = $pass;
//     header('location:../admin.php');
// } else echo "<script language= 'javascript'>alert('Sai email đăng nhập hoặc mật khẩu!');location.href='../login.php';</script>";

// mysqli_close($conn);
