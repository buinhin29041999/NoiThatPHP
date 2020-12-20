<?php
require('connect.php');
$id = $_GET['id'];
$sql = "SELECT * from customer where id='$id'";
$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($r);
$status = 1;
if ($row['status'] == 1) $status = 0;

$sql = "UPDATE customer SET status='$status' where id='$id'";
$r = mysqli_query($conn, $sql);
header("location:../views/CustomerList.php?type=list");
mysqli_close($conn);
