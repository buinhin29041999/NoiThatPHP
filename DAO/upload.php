<?php
require('connect.php');
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
$error = '';
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $error = " File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error = $error . " Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $error = $error . " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script language='javascript'> alert('$error');location.href='../views/CustomerUploadImage.php'";
    // if everything is ok, try to upload file
} else {
    $img = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    // Encode the image string data into base64 
    $data = base64_encode($img);

    // Display the output 
    $img_base64 = "data:" . $check["mime"] . ";base64," . $data;
    $current_user = $_SESSION['username'];
    $sql = "UPDATE customer SET image='$img_base64' WHERE email = '$current_user'";
    mysqli_query($conn, $sql);
    if ($_SESSION['type'] == 'ADMIN')
        header("location:../views/admin.php");
    else header("location:../views/home.php");

    mysqli_close($conn);
}
