<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Thêm sản phẩm</title>
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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">Sản phẩm</li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ol>
                    <form method="post">
                        <table border="1" cellpadding="10" cellspacing="0" bordercolor="#3399FF" align="center">
                            <tr>
                                <td>Hình ảnh</td>
                                <td><input type="file" name="upload_image" ></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" name="txt_ten" value=""  class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="number" name="txt_dongia" value="" class="form-control py-2"/></td>
                            </tr>

                            <tr>
                                <td>Loại hàng</td>
                                <td><input type="text" name="txt_loai" value="" class="form-control py-2" /></td>
                            </tr>

                            <tr>
                                <td>Xuất xứ</td>
                                <td><input type="text" name="txt_xuatxu" value="" class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Kiểu dáng</td>
                                <td><input type="text" name="txt_kieudang" value="" class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td><input type="text" name="txt_mausac" value="" class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><input type="number" name="txt_soluong" value="" class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                
                                <td colspan="2" align="center"><input type="submit" value="Nhập" name="" class="btn btn-primary"/></td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    include("../DAO/connect.php");
                    if(isset($_POST["upload_image"])){
                        $anh = $_POST["upload_image"];
                        $ten = $_POST["txt_ten"];
                        $dongia = $_POST["txt_dongia"];
                        $loai = $_POST["txt_loai"];
                        $xuatxu = $_POST["txt_xuatxu"];
                        $kieu = $_POST["txt_kieudang"];
                        $mau = $_POST["txt_mausac"];
                        $soluong = $_POST["txt_soluong"];
                        $sql = "INSERT INTO product(HinhAnh, TenSanPham, DonGia, LoaiHang, XuatXu, KieuDang, MauSac, SoLuong) VALUES('$anh','$ten','$dongia','$loai','$xuatxu','$kieu','$mau','$soluong')";
                        mysqli_query($conn, $sql);
                        header("location:ProductList.php");
                    }

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