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
                        <table border="1" cellpadding="0" cel cellspacing="0" bordercolor="#3399FF">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td><input type="text" value="" name="ma" /></td>
                            </tr>

                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" value="" name="ten" /></td>
                            </tr>

                            <tr>
                                <td>Loại hàng</td>
                                <td><input type="text" value="" name="loai" /></td>
                            </tr>

                            <tr>
                                <td>Xuất xứ</td>
                                <td><input type="text" value="" name="xuatxu" /></td>
                            </tr>

                            <tr>
                                <td>Kiểu dáng</td>
                                <td><input type="text" value="" name="kieu" /></td>
                            </tr>

                            <tr>
                                <td>Màu sắc</td>
                                <td><input type="text" value="" name="mau" /></td>
                            </tr>

                            <tr>
                                <td>Số lượng</td>
                                <td><input type="text" value="" name="sl" /></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" value="Sửa" name="nhap" /></td>
                            </tr>

                        </table>
                    </form>
                    <?php
                    include("connect.php");
                    $ma = $_POST["ma"];
                    $ten = $_POST["ten"];
                    $loai = $_POST["loai"];
                    $xuatxu = $_POST["xuatxu"];
                    $kieudang = $_POST["kieu"];
                    $mau = $_POST["mau"];
                    $solhuong = $_POST["sl"];
                    $sql = "UPDATE productmanagement SET MaSP='$ma',TenSanPham='$ten',LoaiHang='$loai',XuatXu='$xuatxu',KieuDang='$kieudang',MauSac='$mau',SoLuong='$solhuong' WHERE MaSP='$ma'";
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