<!DOCTYPE html>
<html lang="en">
<?php
require('../DAO/connect.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM customer where id='$id'";
    $r = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($r);
    $ho = $row['last_name'];
    $ten = $row['first_name'];
    $gt = $row['gender'];
    $ns = $row['birthday'];
    $dc = $row['address'];
    $sdt = $row['phone'];
    $note = $row['note'];
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Chỉnh sửa</title>
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
                    <h1 class="mt-4">Chỉnh sửa thông tin</h1>
                    <form action="../DAO/prcModifyAcc.php" method="POST">
                        <table cellpadding="7" cellspacing="0" align="center">
                            <tr>
                                <td>Họ đệm</td>
                                <td><input type="text" name="txtho" value="<?php echo $ho ?>" required></td>
                            </tr>
                            <tr>
                                <td>Tên</td>
                                <td><input type="text" name="txtten" value="<?php echo $ten ?>" required></td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td><input type="radio" id="male" name="gender" value="0" <?php if ($gt == 0) echo "checked"; ?>>
                                    <label for="male">Nam</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="female" name="gender" value="1" <?php if ($gt == 1) echo "checked"; ?>>
                                    <label for="female">Nữ</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Ngày sinh</td>
                                <td><input type="date" name="txtns" value="<?php echo $ns ?>" required></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><textarea name="txtdc" required><?php echo $dc ?></textarea>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="number" name="txtsdt" value="<?php echo $sdt ?>" required></td>
                            </tr>
                            <tr>
                                <td>Ghi chú</td>
                                <td><textarea name="txtghichu" required><?php echo $note ?></textarea>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-primary" value="Sửa"></td>
                                <td><a class="btn btn-primary" href="CustomerList.php?type=list">Quay lại</a></td>
                            </tr>
                        </table>
                        <input type="hidden" name="flag" value="modifyAcc">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
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


</html>