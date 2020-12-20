<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Trang chủ</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/shop-homepage.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <!-- Import file xử lý nối HTML-->
    <script src="../master/importHTML.js"></script>
</head>

<body class="sb-nav-fixed" style="background-color: #e6f2ff;">

    <!-- Import thanh menu trên cùng-->
    <div w3-include-html="../master/nav.php"></div>

    <!-- Page Content -->
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">GIỎ HÀNG</h1>
        </div>
    </section>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-right">Đơn giá</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require('../DAO/connect.php');
                            session_start();
                            $idUser = $_SESSION['id_user'];
                            $tongTien = 0;
                            $ship = 0;

                            $sql = "SELECT * FROM cart where CustomerId = '$idUser'";
                            $r = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($r)) {
                                $idSP = $row['ItemID'];
                                $slSP = $row['Amount'];
                                $idCart = $row['id'];
                                
                                $sql2 = "SELECT * FROM product WHERE id='$idSP'";
                                $r2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($r2);
                                $tenSP = $row2['TenSanPham'];
                                $anh=$row2['HinhAnh'];

                                if ($row2['SoLuong'] >= 1)
                                    $status = "<p style = 'color: green;'>Còn hàng</p>";
                                else $status = "<p style ='color: red;'>Hết hàng</p>";
                                $donGia = $row2['DonGia'];
                                $tongTien += $slSP * $donGia;
                            ?><tr>
                                    <td><img src="../images/<?php echo $anh ?>"  style="max-width: 100px; max-height: 100px;"/> </td>
                                    <td style="color: blue;"><?php echo $tenSP ?></td>
                                    <td><?php echo $status ?>

                                    </td>
                                    <td>
                                        <form method="POST" action="../DAO/updateCart.php" id="formId" name="formId">
                                            <input type="hidden" name="flag" value="UpdateCart">
                                            <input type="hidden" name="id" id="id" value="<?php echo $idCart ?>">
                                            <input type="hidden" name="slSPUpdate" id="slSPUpdate" value="<?php echo $slSP ?>">

                                            <input type="number" value="<?php echo $slSP ?>" id="Number" name="Number" />
                                            <button class="btn btn-sm btn-success" title="Cập nhật giỏ hàng"><i class="fas fa-sync-alt"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-right"><?php echo $donGia ?></td>
                                    <td class="text-right">
                                        <form action="../DAO/updateCart.php" method="POST">
                                            <input type="hidden" name="idDel" value="<?php echo $idCart ?>">
                                            <input type="hidden" name="flag" value="DelCart">
                                            <button class="btn btn-sm btn-danger" title="Xóa mặt hàng"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                <?php
                            }
                                ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Giá chưa ship</td>
                                    <td class="text-right"><?php echo $tongTien ?> </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Giá ship</td>
                                    <td class="text-right"><?php echo $ship;
                                                            $FinalCost = $tongTien + $ship; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Tổng tiền</strong></td>
                                    <td class="text-right"><strong><?php echo $FinalCost; ?></strong></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a class="btn btn-block btn-light" href="home.php">Tiếp tục mua sắm</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <form action="../views/payPage_addInf.php" method="POST">
                            <input type="hidden" name="flag" value="nonDirectPay">
                            <input type="hidden" name="finalCost" value="<?php echo $FinalCost ?>">                            
                            <button class="btn btn-lg btn-block btn-success text-uppercase">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <div w3-include-html="../master/footer.html"></div>
    <!-- Thực thi hàm import các file HTML vào HTML -->
    <script>
        $(document).ready(function() {
            $("input[name='Number']").change(function() {

                var sl = $(this).val();
                var id = $("input[name='id']").val();
                $("input[name='slSPUpdate']").val(sl);

            });
        });
        includeHTML();
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>