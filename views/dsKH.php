<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Danh sách</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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
                        <li class="breadcrumb-item ">Quản lý khách hàng</li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Khách hàng
                        </div>
                        <div class="card-body table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Họ đệm</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Email/Tên đăng nhập</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Câu hỏi</th>
                                        <th scope="col">Trả lời</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Ngày chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require('../DAO/connect.php');
                                    $sql = "SELECT * from customer";
                                    $check = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($check)) {
                                        $id = $row['id'];
                                        $ho = $row['last_name'];
                                        $ten = $row['first_name'];
                                        if ($row['id'] == 0)
                                            $gt = 'Nam';
                                        else if ($row['id'] == 1)
                                            $gt = 'Nữ';
                                        else $gt = '';
                                        $ns = $row['birthday'];
                                        $email = $row['email'];
                                        $dc = $row['address'];
                                        $sdt = $row['phone'];
                                        $type = $row['type'];
                                        $ques = $row['remember_question'];
                                        $ans = $row['remember_token'];
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
                                                <form action="" method="get">
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                    <button type="submit" title="Chỉnh sửa" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-tools"></i>
                                                    </button>
                                                </form>
                                                <form action="" method="get">
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                    <button type="submit" <?php if ($row['status'] == 1) echo "title='Hủy kích hoạt tài khoản' class='btn btn-sm btn-outline-danger'";
                                                    else echo "title='Kích hoạt tài khoản' class='btn btn-sm btn-outline-success'"; ?>>
                                                        <?php if ($row['status'] == 1) echo "<i class='fas fa-ban'></i>"; else echo "<i class='fas fa-redo'></i>"; ?>
                                                    </button>
                                                </form>
                                            </th>

                                            <td><?php echo $ho ?></td>
                                            <td><?php echo $ten ?></td>
                                            <td><?php echo $gt ?></td>
                                            <td><?php echo $ns ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $dc ?></td>
                                            <td><?php echo $sdt ?></td>
                                            <td><?php echo $ques ?></td>
                                            <td><?php echo $ans ?></td>
                                            <td><?php echo $ghichu ?></td>
                                            <td><?php echo $create ?></td>
                                            <td><?php echo $modify ?></td>
                                        </tr>
                                    <?php
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>

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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>