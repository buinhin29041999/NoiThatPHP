<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Thông tin thanh toán</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/shop-homepage.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Import file xử lý nối HTML-->
    <script src="../master/importHTML.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    if ($_POST['flag'] == "directPay")
        $url = "prcDirectPay.php";
    else $url = "prcPay.php";

    ?>
    <!-- Import thanh menu trên cùng-->
    <div w3-include-html="../master/nav.php"></div>

    <!-- Page Content -->
    <div class="container">
        <div style="font-size: 32px ; margin-left: 380px;margin-bottom: 70px; color: blue; margin-top: 20px;"><b>Thông tin thanh toán</b></div>
        <form action="../DAO/<?php echo $url ?>" method="POST">
            <table align="center" cellspacing=20 cellpadding=15>
                <tr>
                    <?php
                    if (isset($_POST['finalCost']))
                        $finalCost = $_POST['finalCost'];
                    else $finalCost = 0;
                    ?>
                    <input type="hidden" name="finalCost" value="<?php echo $finalCost ?>">
                    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                    <?php if ($url == "prcDirectPay.php") echo "<td>Số lượng mặt hàng <span style='color: red;'>(*)</span></td>
                    <td><input type='number' name='soluong' required></td>";  ?>

                </tr>
                <tr>
                    <td>Địa chỉ <span style="color: red;">(*)</span></td>
                    <td><textarea name="diachi" cols="23" rows="5" required> </textarea></td>
                </tr>
                <tr>
                    <td>Số điện thoại <span style="color: red;">(*)</span></td>
                    <td><input type="number" name="sdt" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit"  onclick="return alert('Đặt hàng thành công!');" class="btn btn-success" value="Đặt hàng"></td>
                    <td align="center"><a class="btn btn-warning" href="home.php">Quay lại</a></td>
                </tr>
            </table>
        </form>


    </div>
    <!-- /.container -->
    <div w3-include-html="../master/footer.html"></div>
    <!-- Thực thi hàm import các file HTML vào HTML -->
    <script>
        includeHTML();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>