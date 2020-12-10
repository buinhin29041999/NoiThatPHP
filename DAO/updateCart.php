<?php
require('connect.php');
session_start();
if ($_POST['flag'] == "UpdateCart") {
    $idUpdate = $_POST['id'];
    $slUpdate = $_POST['slSPUpdate'];
    $sql = "UPDATE cart SET Amount ='$slUpdate' WHERE id='$idUpdate' ";
    mysqli_query($conn,$sql);
    header("location: ../views/cart.php");
} else {
    $idDel= $_POST['idDel'];
    $sql = "DELETE FROM cart WHERE id='$idDel' ";
    mysqli_query($conn,$sql);
    header("location: ../views/cart.php");
}
