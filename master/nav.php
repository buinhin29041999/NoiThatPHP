<!-- Định nghĩa cho thanh menu trên cùng-->
<?php
require('../DAO/connect.php');
session_start();
$email = $_SESSION['username'];
$sql = "SELECT image FROM customer WHERE email = '$email'";
$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($r);
?>
<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="admin.php">PHOXINH'S STORE</a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $row['image']; ?>" alt="Hi" class="img-circle-10" style="width:50px; height: 50px; object-fit:cover; border-radius: 50%;"> </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="uploadImage.php"><?php echo $_SESSION['name']; ?></a>
                <a class="dropdown-item" href="changePassword.php">Đổi mật khẩu</a>
                <a class="dropdown-item" href="">Cập nhật bảo mật</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>