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
                        <li class="breadcrumb-item active"><a href="CustomerList.php?type=list">Thêm</a></li>
                    </ol>
                    <form method="post">

                        <table border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#3399FF">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td><input type="text" value="" name="txt_ma"  class="form-control py-2"/></td>
                            </tr>

                            <tr>
                                <td align="center">Hình ảnh</td>
                                <td><input type="file" value="" name="upload_image" /></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" value="" name="txt_ten"  class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><input type="text" value="" name="txt_sl" class="form-control py-2" /></td>
                            </tr>
                            <tr>
                                <td>Giá</td>
                                <td><input type="text" value="" name="txt_gia"  class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                <td>Vốn tồn kho</td>
                                <td><input type="text" value="" name="txt_von"  class="form-control py-2"/></td>
                            </tr>
                            <tr>
                                
                                <td colspan="2" align="center"><input class="btn btn-primary" type="submit" value="Nhập" name="nhap" /></td>
                            </tr>
                            <?php
                            include("../DAO/connect.php");
                            if (isset($_POST["txt_ma"])) {
                                $ma = $_POST["txt_ma"];
                                $anh = $_POST["upload_image"];
                                $ten = $_POST["txt_ten"];
                                $sl = $_POST["txt_sl"];
                                $gia = $_POST["txt_gia"];
                                $vontonkho = $_POST["txt_von"];
                                $sql = "INSERT INTO inventorymanagement VALUES('$ma','$anh','$ten','$sl','$gia','$vontonkho')";
                                mysqli_query($conn, $sql);
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