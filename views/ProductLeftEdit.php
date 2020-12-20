<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Quản lý hàng tồn</title>
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
                        <li class="breadcrumb-item ">Hàng tồn</li>
                        <li class="breadcrumb-item active"><a href="CustomerList.php?type=list">Sửa</a></li>
                    </ol>
                    <form method="post">
                        <table border="1" align="center" cellpadding="10" cellspacing="0">
                            <tr>
                                <td>Mã hàng tồn</td>
                                <td><input type="text" value="" name="txt_masp" class="form-control py-2" /></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh</td>
                                <td><input type="file" name="upload_image" /></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" name="txt_tensp" class="form-control py-2" /></td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><input type="text" name="txt_slsp" class="form-control py-2" /></td>
                            </tr>
                            <tr>
                                <td>Giá</td>
                                <td><input type="text" name="txt_giasp" class="form-control py-2" /></td>
                            </tr>
                            <tr>
                                <td>Vốn tồn kho</td>
                                <td><input type="text" name="txt_vonsp" class="form-control py-2" /></td>
                            </tr>
                            <tr>

                                <td colspan="2" align="center"><input class="btn btn-primary" type="submit" value="Sửa" name="sua" /></td>
                            </tr>

                            <?php
                            include("../DAO/connect.php");
                            if (isset($_POST["txt_masp"])) {
                                $ma = $_POST["txt_masp"];
                                $anh = $_POST["upload_image"];
                                $ten = $_POST["txt_tensp"];
                                $sl = $_POST["txt_slsp"];
                                $gia = $_POST["txt_giasp"];
                                $von = $_POST["txt_vonsp"];
                                $query = "UPDATE inventorymanagement SET MaHangTon='$ma' ,HinhAnh='$anh',TenSanPham='$ten',SoLuong='$sl',Gia='$gia',VonTonKho='$von' WHERE MaHangTon='$ma'";
                                mysqli_query($conn, $query);
                                header("location:ProductLeftList.php");
                            }
                            ?>
                        </table>


                    </form>
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