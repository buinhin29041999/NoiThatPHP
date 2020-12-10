<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Thay đổi mật khẩu</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import file xử lý nối HTML-->
    <script src="../master/importHTML.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Import thanh menu trên cùng-->
    <div w3-include-html="../master/nav.php"></div>

    <div id="layoutSidenav">


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">

                    <!-- Nội dung chính -->
                    <h1 class="mt-4">Quản lý</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Đổi mật khẩu</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="../DAO/prcChangePass.php">
                                <table align="center" cellpadding="5" cellspacing="1" border="1">
                                    <tr>
                                        <td colspan="2" align="center" style="background-color: turquoise;">Người dùng hiện tại</td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu mới</td>
                                        <td><input type="password" name="password" id="password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nhập lại mật khẩu</td>
                                        <td><input type="password" name="rePassword" id="rePassword" required></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><span id='message'></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Đồng ý" disabled></td>
                                    </tr>
                                </table>
                                <input type="hidden" name="flag" value="changePass2">
                            </form>
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
        $('#password, #rePassword').on('keyup', function() {
            if ($('#password').val() == $('#rePassword').val()) {
                $('#message').html('Xác nhận đúng!').css('color', 'green');
                document.getElementById('submit').disabled = false;
            } else {
                $('#message').html('Xác nhận mật khẩu sai').css('color', 'red');
                document.getElementById('submit').disabled = true;
            }
        });
    </script>
    <script>
        includeHTML();
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>