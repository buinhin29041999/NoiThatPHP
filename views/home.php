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

    <!-- Import file xử lý nối HTML-->
    <script src="../master/importHTML.js"></script>
</head>

<body class="sb-nav-fixed" style="background-color: #e6f2ff;">

    <!-- Import thanh menu trên cùng-->
    <div w3-include-html="../master/nav.php"></div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <img src="../images/logo.png" style="max-width: 150px;max-height: 150px;margin-top: 50px;">

                <!-- <div class="list-group" style="margin-top: 50px;">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div> -->

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="../images/slide1.jpg" alt="First slide" style="max-height: 350px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../images/slide2.jpg" alt="Second slide" style="max-height: 350px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../images/slide3.jpg" alt="Third slide" style="max-height: 350px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">
                    <?php
                    require("../DAO/connect.php");
                    $sql = "SELECT * FROM product";
                    $r = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($r)) {
                        $id = $row['id'];
                        $ten = $row['TenSanPham'];
                        $dongia = $row['DonGia'];

                        $mota = $row['MoTa'];
                    ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $ten ?></a>
                                    </h4>
                                    <h5><?php echo $dongia ?> </h5>
                                    <p class="card-text"><?php echo $mota ?></p>
                                </div>
                                <div class="card-footer">
                                    <form method="POST" action="payPage_addInf.php">
                                        <input type="hidden" name="flag" value="directPay">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button style="float: left;" class="btn btn-success"><i class="fas fa-money-bill-wave"></i>
                                            Thanh toán
                                        </button>
                                    </form>
                                    <form method="POST" action="../DAO/prcInsertToCart.php">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button title="Thêm vào giở hàng" class="btn btn-primary" onclick="return alert('Thêm vào giỏ hàng thành công!');" style="margin-left: 30px;">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

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