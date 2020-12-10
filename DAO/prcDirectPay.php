<?php
require('connect.php');
session_start();


$id_user = $_SESSION['id_user'];

$idSP = $_POST['id'];
$slSP = $_POST['soluong'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$create_date = date("Y-m-d");

$sql = "SELECT * FROM product WHERE id='$idSP'";
$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($r);

$donGia = $row['DonGia'];
$totalCost = $donGia * $slSP;

$sql2 = "INSERT INTO bill(CustomerID,CreateDate,Address,Phone,TotalCost) VALUES('$id_user','$create_date','$diachi','$sdt','$totalCost')";
mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM bill WHERE id_bill = (SELECT MAX(id_bill) From bill WHERE CustomerID='$id_user')";
$r2 = mysqli_query($conn, $sql3);
$row2 = mysqli_fetch_assoc($r2);
$idbill = $row2['id_bill'];

$sql4 = "INSERT INTO orderitem(ItemID,BillID,Amount,Price) VALUES ('$idSP','$idbill','$slSP','$donGia')";
mysqli_query($conn, $sql4);
header("location: ../views/home.php");
