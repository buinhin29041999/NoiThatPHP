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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>

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
                        <li class="breadcrumb-item active"><a href="CustomerList.php?type=list">Danh sách</a></li>
                    </ol>
                    <form method="post">

                        <table border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#3399FF">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td align="center">Hình ảnh</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Giá</td>
                                <td>Vốn tồn kho</td>
                            </tr>


                            <?php
                            include("../DAO/connect.php");
                            $sql = "SELECT * FROM inventorymanagement";
                            $r = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($r)) {
                                $ma = $row["MaHangTon"];
                                $hinhanh = $row["HinhAnh"];
                                $ten = $row["TenSanPham"];
                                $sl = $row["SoLuong"];
                                $gia = $row["Gia"];
                                $von = $row["VonTonKho"];
                            ?>

                                <tr>
                                    <td><?php echo $ma; ?></td>
                                    <td><?php echo '<img src="images/' . $hinhanh . '" />'; ?></td>
                                    <td><?php echo $ten; ?></td>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $gia; ?></td>
                                    <td><?php echo $von = $gia * $sl; ?></td>
                                <?php
                            }
                                ?>

                                </tr>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>