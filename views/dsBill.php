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
<?php
require('../DAO/connect.php');


?>

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
                    <h1 class="mt-4">Danh sách hóa đơn</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                    <?php
                    $sql1 = "SELECT * FROM Bill join customer on Bill.CustomerID=customer.id";
                    $r1 = mysqli_query($conn, $sql1);
                    while ($row1 = mysqli_fetch_assoc($r1)) {
                        $iduser = $row1['id'];
                        $idBill = $row1['id_bill'];
                        $user = $row1['last_name'] . " " . $row1['first_name'];
                        $createDate = $row1['CreateDate'];
                        $TotalCost=$row1['TotalCost'];

                    ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Hóa đơn: <?php echo $idBill ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Ngày lập: <?php echo $createDate ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Tên: <?php echo $user ?>
                                <button class="btn btn-success" style="float: right;margin-right: 10px;"><i class="fas fa-print"></i>&nbsp;&nbsp;<a style="color: white;" href="">In hóa đơn</a></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã hàng</th>
                                                <th>Tên hàng</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá </th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql2 = "SELECT * FROM orderitem WHERE BillId='$idBill'";                                                                                 
                                            $r2 = mysqli_query($conn, $sql2);
                                            while ($row2 = mysqli_fetch_assoc($r2)) {
                                                $idhang = $row2['ItemID'];
                                                
                                                $sql3="SELECT * FROM product WHERE id='$idhang'";
                                                $r3=mysqli_query($conn, $sql3);
                                                $row3 = mysqli_fetch_assoc($r3);                                                

                                                $tenhang = $row3['TenSanPham'];
                                                $sl = $row2['Amount'];
                                                $dongia = $row2['Price'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $idhang ?></td>
                                                    <td><?php echo $tenhang ?></td>
                                                    <td><?php echo $sl ?></td>
                                                    <td><?php echo $dongia ?></td>
                                                    <td><?php echo $sl * $dongia ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">
                                                    Tổng tiền
                                                </th>
                                                <th>
                                                    <?php echo $TotalCost ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                    <?php
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