<?php
require('connect.php');
session_start();

$id_user = $_SESSION['id_user'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$create_date = date("Y-m-d");
$totalCost = $_POST['finalCost'];

$sql2 = "INSERT INTO bill(CustomerID,CreateDate,Address,Phone,TotalCost) VALUES('$id_user','$create_date','$diachi','$sdt','$totalCost')";
mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM bill WHERE id_bill = (SELECT MAX(id_bill) From bill WHERE CustomerID='$id_user')";
$r2 = mysqli_query($conn, $sql3);
$row2 = mysqli_fetch_assoc($r2);
$idbill = $row2['id_bill'];

//Load từ sản phẩm trong giỏ hàng của user
$sql = "SELECT * FROM cart WHERE CustomerId='$id_user'";
$r = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($r)) {
    $idSP = $row['ItemID'];
    $sql5 = "SELECT * FROM product WHERE id= '$idSP'";
    $r3 = mysqli_query($conn, $sql5);
    $row3 = mysqli_fetch_assoc($r3);
    $donGia = $row3['DonGia'];
    $slSP = $row['Amount'];
    $sql4 = "INSERT INTO orderitem(ItemID,BillID,Amount,Price) VALUES ('$idSP','$idbill','$slSP','$donGia')";
    mysqli_query($conn, $sql4);
}

//Delete cart
$s="DELETE FROM cart where CustomerId='$id_user'";
mysqli_query($conn,$s);
mysqli_close($conn);
header("location: ../views/home.php");
