<?php
require('connect.php');
if (isset($_POST['flag']))
    if ($_POST['flag'] != "modifyAcc")
        header("location:../views/logout.php");
if (!isset($_POST['flag']))
    header("location:../views/logout.php");

$id = $_POST['id'];
$ho = $_POST['txtho'];
$ten = $_POST['txtten'];
$gt = $_POST['gender'];
$ns = $_POST['txtns'];
$dc = $_POST['txtdc'];
$sdt = $_POST['txtsdt'];
$note = $_POST['txtghichu'];
$modifyDate = date("Y-m-d");
$sql = "UPDATE customer SET first_name='$ten', last_name='$ho', gender='$gt', birthday='$ns', address='$dc', phone='$sdt', note='$note', update_at='$modifyDate' where id='$id'";
$r = mysqli_query($conn, $sql);
header("location:../views/dsKH.php");
