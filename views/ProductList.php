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

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">Sản phẩm</li>
                        <li class="breadcrumb-item active"><a href="ProductList.php">Danh sách</a></li>
                    </ol>

                    <h2 align="center" style="padding-bottom: 25px;">Quản lý sản phẩm</h2>
                    <div align="center" style="padding-bottom: 15px;">
                        <form method="get">
                            Tìm kiếm: <input type="text" name="search" />
                            <input type="submit" name="ok" value="search" />
                        </form>
                    </div>
                    </p>

                    <?php

                    include("../DAO/connect.php");
                    // Nếu người dùng submit form thì thực hiện
                    if (isset($_REQUEST['ok'])) {
                        // Gán hàm addslashes để chống sql injection
                        $search = addslashes($_GET['search']);

                        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                        if (empty($search)) {
                            echo "Yeu cau nhap du lieu vao o trong";
                        } else {
                            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                            $query = "select * from product where TenSanPham like '%$search%'";

                            // Thực thi câu truy vấn
                            $sql = mysqli_query($conn, $query);

                            // Đếm số đong trả về trong sql.
                            $num = mysqli_num_rows($sql);

                            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                            if ($num > 0 && $search != "") {
                                // Dùng $num để đếm số dòng trả về.
                                echo "<span style='color: red;'>Có $num kết quả với từ khóa <b>$search</b></span>";

                                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    ?>
                                <table border="1" cellpadding="17" bordercolor="#3399FF" style="margin-top: 20px;">
                                    <tr>
                                    <td>ID</td>
                                        <td align="center">Hình ảnh</td>
                                        <td align="center">Tên sản phẩm</td>
                                        <td align="center">Đơn giá</td>
                                        <td align="center">Loại hàng</td>
                                        <td align="center">Xuất xứ</td>
                                        <td align="center">Kiểu dáng</td>
                                        <td align="center">Màu sắc</td>
                                        <td align="center">Số lượng</td>
                                    </tr>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        $ma = $row["id"];
                                        $base64 = $row["HinhAnh"];
                                        $tenSP = $row["TenSanPham"];
                                        $dongia = $row["DonGia"];
                                        $loai = $row["LoaiHang"];
                                        $xuatxu = $row["XuatXu"];
                                        $kieu = $row["KieuDang"];
                                        $mausac = $row["MauSac"];
                                        $soluong = $row["SoLuong"];
                                    ?>
                                        <tr>

                                            <td align="center"><?php echo $ma; ?></td>
                                            <td align="center">
                                            <?php echo "<img style='max-height:100px;max-width:100px;' src='../images/" . $base64 . "' />" ?>
                                            </td>
                                            <td align="center"><?php echo $tenSP; ?></td>
                                            <td align="center"><?php echo $dongia; ?></td>
                                            <td align="center"><?php echo $loai ?></td>
                                            <td width="120" align="center"><?php echo $xuatxu; ?></td>
                                            <td><?php echo $kieu ?></td>
                                            <td><?php echo $mausac; ?></td>
                                            <td align="center"><?php echo $soluong ?></td>
                                        </tr>
                            <?php
                                    }
                                    echo '</table>';
                                } else {
                                    echo "Khong tim thay ket qua!";
                                }
                            }
                        } else {
                            ?>
                            <form method="post">
                                <table border="1" cellpadding="15" bordercolor="#3399FF">
                                    <tr>
                                        <td>ID</td>
                                        <td align="center">Hình ảnh</td>
                                        <td align="center">Tên sản phẩm</td>
                                        <td align="center">Đơn giá</td>
                                        <td align="center">Loại hàng</td>
                                        <td align="center">Xuất xứ</td>
                                        <td align="center">Kiểu dáng</td>
                                        <td align="center">Màu sắc</td>
                                        <td align="center">Số lượng</td>
                                    </tr>
                                    <?php

                                    include("../DAO/connect.php");
                                    //include("base64.php");
                                    $sql = "SELECT * FROM product";
                                    $r = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($r)) {
                                        $ma = $row["id"];
                                        $base64 = $row["HinhAnh"];
                                        $tenSP = $row["TenSanPham"];
                                        $dongia = $row["DonGia"];
                                        $loai = $row["LoaiHang"];
                                        $xuatxu = $row["XuatXu"];
                                        $kieu = $row["KieuDang"];
                                        $mausac = $row["MauSac"];
                                        $soluong = $row["SoLuong"];
                                    ?>
                                        <tr>

                                            <td align="center"><?php echo $ma; ?></td>
                                            <td align="center">
                                                <?php echo "<img style='max-height:100px;max-width:100px;' src='../images/" . $base64 . "' />" ?>
                                            </td>
                                            <td align="center"><?php echo $tenSP; ?></td>
                                            <td align="center"><?php echo $dongia; ?></td>
                                            <td align="center"><?php echo $loai ?></td>
                                            <td width="120" align="center"><?php echo $xuatxu; ?></td>
                                            <td><?php echo $kieu ?></td>
                                            <td><?php echo $mausac; ?></td>
                                            <td align="center"><?php echo $soluong ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
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