<?php
require('connect.php');
session_start();
if (isset($_POST['inputEmailAddress']) && isset($_POST['inputPassword'])) {
    $user = $_POST['inputEmailAddress'];
    $pass = $_POST['inputPassword'];
}
$sql = "select * from customer where email='$user' and password='$pass'";
$check = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($check);
if (isset($row['email']) && isset($row['password'])) {
    $_SESSION['username'] = $user;
    $_SESSION['password'] = $pass;
    echo "<script language= 'javascript'>location.href='../admin.php'</script>";
} else echo 0;
mysqli_close($conn);
