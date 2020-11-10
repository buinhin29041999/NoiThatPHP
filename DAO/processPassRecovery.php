<?php
require('connect.php');
$phase = 0;
$phase = $_POST['phase'];
if ($phase == 1) {
    if (isset($_POST['inputEmailAddress']))
        $email = $_POST['inputEmailAddress'];

    //Kiểm tra có tồn tại email này hay không??
    $s = "SELECT COUNT(*) as count from customer where email='$email'";
    $query = mysqli_query($conn, $s);
    $row = mysqli_fetch_assoc($query);
    if ((int)$row['count'] > 0) {
        $mail = $email;
        header("location:../views/security_ques.php");
    } else echo "<script language= 'javascript'>alert('Email đã nhập không tồn tại!');
    location.href='../views/password.php';</script>";
} elseif ($phase == 2) {
    if (isset($_POST['inputQuestion'])) {
        $ques = $_POST['inputQuestion'];
        $ans = $_POST['inputAnswer'];
    }
    $sql = "SELECT COUNT(*) as count from customer where email='$mail' and remember_question='$ques' and remember_token='$ans'";
    echo $mail;
    
    // $check = mysqli_query($conn, $sql);
    // $r = mysqli_fetch_assoc($check);
    // if ((int)$row['count'] > 0) {        
    //     header("location:../views/newPass.php");
    // } else echo "<script language= 'javascript'>alert('Câu hỏi bảo mặt hoặc câu trả lời không đúng!');
    // location.href='../views/security_ques.php';</script>";
}
