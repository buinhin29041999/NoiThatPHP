<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Danh sách khách hàng</title>
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
                    <h2 class="mt-4">Danh sách</h2>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item ">Khách hàng</li>
                        <li class="breadcrumb-item active"><a href="dsKH.php?type=list">Danh sách</a></li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Khách hàng
                        </div>
                        <div>
                            <form action="dsKH.php" method="GET">
                                <input type="hidden" name="type" value="find">
                                &nbsp;&nbsp;&nbsp;&nbsp; Tìm kiếm theo:&nbsp;&nbsp;&nbsp;
                                <select name="timTheo">
                                    <option>Tên</option>
                                    <option>Số điện thoại</option>
                                    <option>Email</option>
                                </select>
                                <input type="text" name="findName" placeholder="Nhập từ khóa cần tìm" required style="margin-top: 22px; margin-left: 55px; width: 310px; font-size: 15px;">
                                <button class="btn btn-sm btn-primary" style="margin-left: 20px;"><i class="fas fa-search"></i>Tìm kiếm</button>
                            </form>

                        </div>
                        <div class="card-body">
                            <table style="text-align: center;" border="1">
                                <thead>
                                    <tr style="background-color: #e0e0d1;">
                                        <th scope="col">#</th>
                                        <th scope="col" style="width: 140px;">Họ đệm</th>
                                        <th scope="col" style="width: 90px;">Tên</th>
                                        <th scope="col" style="width: 90px;">Giới tính</th>
                                        <th scope="col" style="width: 110px;">Ngày sinh</th>
                                        <th scope="col" style="width: 210px;">Email</th>
                                        <th scope="col" style="width: 270px;">Địa chỉ</th>
                                        <th scope="col" style="width: 110px;">Điện thoại</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="type" value="">
                                    <?php
                                    require('../DAO/connect.php');
                                    $sql = "";
                                    if ($_GET['type'] == "list")
                                        $sql = "SELECT * from customer";
                                    elseif ($_GET['type'] == "find") {
                                        if (isset($_GET['findName']))
                                            $ten = $_GET['findName'];
                                        if ($_GET['timTheo'] == "Tên")
                                            $tim = "first_name";
                                        elseif ($_GET['timTheo'] == "Số điện thoại")
                                            $tim = "phone";
                                        elseif ($_GET['timTheo'] == "Email")
                                            $tim = "email";
                                        $sql = "SELECT  * FROM customer WHERE $tim like '$ten'";
                                    }
                                    $result  = mysqli_query($conn, $sql);
                                    $rows = mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $ho = $row['last_name'];
                                        $ten = $row['first_name'];
                                        if ($row['gender'] == 0)
                                            $gt = 'Nam';
                                        else if ($row['gender'] == 1)
                                            $gt = 'Nữ';
                                        else $gt = '';
                                        $ns = $row['birthday'];
                                        $email = $row['email'];
                                        $dc = $row['address'];
                                        $sdt = $row['phone'];
                                        $type = $row['type'];
                                        $ghichu = $row['note'];
                                        $create = $row['create_at'];
                                        $modify = $row['update_at'];
                                        $color = '';
                                        if ($row['status'] == 0)
                                            $color = 'table-dark';
                                        if ($row['type'] == 'ADMIN')
                                            $color = 'bg-success';
                                    ?>
                                        <tr class="<?php echo $color ?>">
                                            <th scope="row">
                                                <form action="modifyAcc.php" method="POST">
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                    <button type="submit" title="Chỉnh sửa" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-tools"></i>
                                                    </button>
                                                </form>
                                                <form action="../DAO/prcActiveAcc.php" method="GET">
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                    <button type="submit" onclick="return confirm('Bạn muốn vô hiệu hóa tài khoản này hay không?')" <?php if ($row['status'] == 1) echo "title='Vô hiệu hóa' class='btn btn-sm btn-outline-danger'";
                                                                                                                                                    else echo "title='Kích hoạt tài khoản' class='btn btn-sm btn-outline-success'";
                                                                                                                                                    if ($row['type'] == 'ADMIN') echo 'disabled'; ?>>
                                                        <?php if ($row['status'] == 1) echo "<i class='fas fa-ban'></i>";
                                                        else echo "<i class='fas fa-redo'></i>"; ?>
                                                    </button>
                                                </form>
                                            </th>

                                            <td style="color: #0052cc;"><?php echo $ho ?></td>
                                            <td style="color: #0052cc;"><?php echo $ten ?></td>
                                            <td><?php echo $gt ?></td>
                                            <td><?php echo $ns ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $dc ?></td>
                                            <td>0<?php echo $sdt ?></td>

                                        </tr>
                                    <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                            <div style="background-color: #99ccff; margin-top: 5px; padding-left: 30px; padding-top: 10px;padding-bottom: 10px;">
                                Tổng số khách hàng: <span style="color: red; font-weight: bold;"><?php echo $rows ?></span>
                                |
                            </div>

                        </div>
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