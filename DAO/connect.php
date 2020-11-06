<?php
$hostname_config = 'localhost';
$database_config = 'db_web_noi_that';
$username_config = 'root';
$password_config = 'pass';
$cookie_usr = 'usr';
$cookie_pas = 'pas';
$cookie_time = (600); // 10 minutes

$conn = mysqli_connect($hostname_config, $username_config, $password_config, $database_config);
if (!$conn) {
    echo ("Không thể kết nối!");
    exit();
}
mysqli_query($conn, "set names 'utf8'");
