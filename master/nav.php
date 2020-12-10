<!-- Định nghĩa cho thanh menu trên cùng-->
<?php
require('../DAO/connect.php');
session_start();
$email = $_SESSION['username'];
$sql = "SELECT image FROM customer WHERE email = '$email'";
$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($r);
if ($_SESSION['type'] == 'ADMIN')
    $link = "admin.php";
else $link = "home.php";
mysqli_close($conn);
?>
<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $link ?>">PHOXINH'S STORE</a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $row['image']; ?>" alt="Hi" class="img-circle-10" style="width:45px; height: 45px; object-fit:cover; border-radius: 50%;"> </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="CustomerUploadImage.php" style="color: green;"><i class="fas fa-user"></i> <?php echo $_SESSION['name']; ?></a>
                <a class="dropdown-item" href="changePassword.php" style="color: blue;"><i class="fas fa-tools"></i> Đổi mật khẩu</a>
                <?php
                    if ($_SESSION['type'] == 'USER')
                    echo "<a class='dropdown-item' href='cart.php' style='color: blue;'><i class='fas fa-shopping-cart'></i> Giỏ hàng</a>";
                ?>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>