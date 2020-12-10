<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Import file xử lý nối HTML-->
    <script src="../master/importHTML.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Import thanh menu trên cùng-->
    <div w3-include-html="../master/nav.php"></div>

    <div id="layoutSidenav">

        <!-- Import menu bên trái-->
        <div w3-include-html="../master/left_panel.php"></div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">

                    <!-- Nội dung chính -->
                    <form method="post">
                        <table border="1" cellpadding="0" cellspacing="0" bordercolor="#3399FF">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td><input type="text" name="txt_ma" value="" /></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh</td>
                                <td><input type="file" name="upload_image"></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" name="txt_ten" value="" /></td>
                            </tr>

                            <tr>
                                <td>Loại hàng</td>
                                <td><input type="text" name="txt_loai" value="" /></td>
                            </tr>

                            <tr>
                                <td align="center">Xuất xứ</td>
                                <td><input type="text" name="txt_xuatxu" value="" /></td>
                            </tr>
                            <tr>
                                <td>Kiểu dáng</td>
                                <td><input type="text" name="txt_kieudang" value="" /></td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td><input type="text" name="txt_mausac" value="" /></td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><input type="text" name="txt_soluong" value="" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Nhập" name="" /></td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    include("connect.php");
                    $ma = $_POST['txt_ma'];
                    $anh = $_POST["upload_image"];
                    $ten = $_POST["txt_ten"];
                    $loai = $_POST["txt_loai"];
                    $xuatxu = $_POST["txt_xuatxu"];
                    $kieu = $_POST["txt_kieudang"];
                    $mau = $_POST["txt_mausac"];
                    $soluong = $_POST["txt_soluong"];
                    $sql = "INSERT INTO productmanagement VALUES('$ma','$anh','$ten','$loai','$xuatxu','$kieu','$mau','$soluong')";
                    mysqli_query($conn, $sql);
                    ?>
                    <!-- Hết nội dung chính-->
                </div>
            </main>
            <div w3-include-html="../master/footer.html"></div>
        </div>
    </div>

    <!-- Thực thi hàm import các file HTML vào HTML -->
    <script>
        includeHTML();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>