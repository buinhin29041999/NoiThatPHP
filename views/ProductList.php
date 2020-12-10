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
                    <h2 align="center">Quản lý sản phẩm</h2>


                    <p>Tìm kiếm theo:<select>
                            <option>Mã sản phẩm</option>
                            <option>Tên sản phẩm</option>
                            <option>Số lượng</option>
                            <option>Màu sắc</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        Tìm kiếm<input type="search" name="" value="Nhập từ khóa tìm kiếm" />
                    </p>
                    <form method="post">
                        <table border="1" cellpadding="0" cellspacing="0" bordercolor="#3399FF">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td align="center">Hình ảnh</td>
                                <td align="center">Tên sản phẩm</td>
                                <td align="center">Loại hàng</td>
                                <td align="center">Xuất xứ</td>
                                <td align="center">Kiểu dáng</td>
                                <td>Màu sắc</td>
                                <td>Số lượng</td>
                            </tr>



                            <?php
                            include("connect.php");                            
                            $sql = "SELECT * FROM productmanagement";
                            $r = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($r)) {
                                $ma = $row["MaSP"];
                                $base64 = $row["HinhAnh"];
                                $tenSP = $row["TenSanPham"];
                                $loai = $row["LoaiHang"];
                                $xuatxu = $row["XuatXu"];
                                $kieu = $row["KieuDang"];
                                $mausac = $row["MauSac"];
                                $soluong = $row["SoLuong"];
                            ?>
                                <tr>

                                    <td align="center"><?php echo $ma; ?></td>
                                    <td align="center">
                                        <?php echo '<img src=' . $base64 . ' />' ?>
                                    </td>
                                    <td align="center"><?php echo $tenSP; ?></td>
                                    <td align="center"><?php echo $loai ?></td>
                                    <td width="120" align="center"><?php echo $xuatxu; ?></td>
                                    <td><?php echo $kieu ?></td>
                                    <td><?php echo $mausac; ?></td>
                                    <td align="center"><?php echo $soluong ?></td>
                                </tr>
                            <?php
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