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
session_start();
$email = $_SESSION['username'];
$sql = "SELECT image from customer WHERE email='$email'";

$r = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($r);
mysqli_close($conn);
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
                    <h1 class="mt-4">Trang cá nhân</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Ảnh đại diện</li>
                        <li class="breadcrumb-item active">Cập nhật ảnh đại diện</li>
                    </ol>
                    <div><img class=" mx-auto d-block" src="<?php echo $row['image'] ?>" alt="Mạng kém quá =((" style="max-width:200px;width:auto;max-height:250px;height: auto;"></div>
                    <div class="card mb-4" style="margin-top: 100px;align-items: center;">
                        <form action="../DAO/upload.php" method="POST" enctype="multipart/form-data">
                            Select image to upload:</br>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            </br>
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                    </div>

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