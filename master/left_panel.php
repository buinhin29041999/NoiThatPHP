<!-- Định nghĩa cho menu ở bên trái -->
<?php
require('../DAO/connect.php');
session_start();
?>
<div id="layoutSidenav_nav" style="font-weight: bold;">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Trang chủ</div>
                <a class="nav-link" href="admin.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bảng điều khiển
                </a>
                <div class="sb-sidenav-menu-heading">Quản lý</div>


                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKH" aria-expanded="false" aria-controls="collapseKH">
                    <div class="sb-nav-link-icon"><i class="fas fa-male"></i><i class="fas fa-female"></i></div>
                    Khách hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseKH" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/CustomerList.php?type=list&currentpage=1">Danh sách</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseKH" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Cấp quyền</a>
                    </nav>
                </div>

                <!-- Section2 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                    Hóa đơn
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/dsBill.php">Danh sách</a>
                    </nav>
                </div>
                <!-- /Section2 -->

                <!-- Section3 -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sanpham" aria-expanded="false" aria-controls="sanpham">
                    <div class="sb-nav-link-icon"><i class="fas fa-couch"></i></div>
                    Sản phẩm
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="sanpham" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductList.php">Danh sách</a>
                    </nav>
                </div>
                <div class="collapse" id="sanpham" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductAdd.php">Thêm</a>
                    </nav>
                </div>
                <div class="collapse" id="sanpham" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductEdit.php">Sửa</a>
                    </nav>
                </div>
                <div class="collapse" id="sanpham" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductDel.php">Xóa</a>
                    </nav>
                </div>
                <!-- /Section3 -->

                <!--Section4-->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hangton" aria-expanded="false" aria-controls="hangton">
                    <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                    Hàng tồn
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="hangton" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductLeftList.php">Danh sách</a>
                    </nav>
                </div>
                <div class="collapse" id="hangton" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductLeftAdd.php">Thêm</a>
                    </nav>
                </div>
                <div class="collapse" id="hangton" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductLeftEdit.php">Sửa</a>
                    </nav>
                </div>
                <div class="collapse" id="hangton" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="../views/ProductLeftDel.php">Xóa</a>
                    </nav>
                </div>
                <!--/Section4-->


                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đã đăng nhập <span class="dot" style="height: 10px; width: 10px; background-color:green; display: inline-block;"></span></div>
            <?php echo $_SESSION['username']; ?>
        </div>
    </nav>
</div>