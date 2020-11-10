 <?php
    require('connect.php');
    $ten = $_POST['inputFirstName'];
    $ho = $_POST['inputLastName'];
    $email = $_POST['inputEmailAddress'];
    $raw_pass = $_POST['inputPassword'];
    $confirm_pass = $_POST['inputConfirmPassword'];
    $create_date = date("Y-m-d");

    //Kiểm tra email tồn tại chưa
    $s = "SELECT COUNT(*) as count from customer where email='$email'";
    $query = mysqli_query($conn, $s);

    if ($query) {
        $row = mysqli_fetch_assoc($query);
        if ((int)$row['count'] > 0) {
            echo "<script language='javascript'>alert('Email đã tồn tại!');location.href='../views/register.php';</script>";
        }
    }

    //Sinh ra chuỗi dài 32 ngẫu nhiên
    $salt = substr(md5(rand()), 0, 32);

    //Sử dụng thêm một salt cố định

    $crypt = hash('md5', $staticSalt . $raw_pass . $salt);

    //Xử lý đăng ký
    $sql = "INSERT into customer (first_name,last_name,email,password,salt,create_at) values ('$ten','$ho','$email','$crypt','$salt','$create_date')";
    $check = mysqli_query($conn, $sql);

    if ($check == 1)
        echo "<script language='javascript'>alert('Đăng ký thành công! Xin mời đăng nhập..');location.href='../views/login.php';</script>";
    mysqli_close($conn);
