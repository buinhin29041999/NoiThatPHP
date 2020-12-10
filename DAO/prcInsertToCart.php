<?php
require('connect.php');
session_start();
$idSP=$_POST['id'];
$idUser=$_SESSION['id_user'];

$sql="INSERT INTO cart(CustomerId,ItemID,Amount) Values ('$idUser','$idSP','1')";
mysqli_query($conn,$sql);
header("location:../views/home.php");

mysqli_close($conn);