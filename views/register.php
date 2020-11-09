<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng ký</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-primary" style="background-image: url('../images/background_image_login.jpg');">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3>
                                </div>
                                <div class="card-body">
                                    <form action="../DAO/processRegister.php" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Họ</label>
                                                    <input class="form-control py-4" name="inputLastName" type="text" placeholder="Họ đệm" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Tên</label>
                                                    <input class="form-control py-4" name="inputFirstName" type="text" placeholder="Tên" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" name="inputEmailAddress" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Địa chỉ email" required />
                                            <span id="showerror" style="color: red;"></span>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Mật khẩu</label>
                                                    <input class="form-control py-4" name="inputPassword" type="password" placeholder="Mật khẩu" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Xác nhận mật khẩu</label>
                                                    <input class="form-control py-4" name="inputConfirmPassword" type="password" placeholder="Xác nhận mật khẩu" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="Tạo tài khoản"></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Bạn đã có tài khoản? Đăng nhập</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- <script language="javascript">
        $('form').submit(function() {

            // Xóa trắng thẻ div show lỗi
            $('#showerror').html('');

            var username = $('#username').val();
            var email = $('#email').val();

            $.ajax({
                url: 'do_validate.php',
                type: 'post',
                dataType: 'String',
                data: {
                    username: username,
                    email: email
                },
                success: function(result) {

                    // Kiểm tra xem thông tin gửi lên có bị lỗi hay không
                    // Đây là kết quả trả về từ file processRegister.php                    
                    var html = '';                    

                    // Lấy thông tin lỗi email
                    if ($.trim(result.email) != '') {
                        html += result.email;
                    }

                    // Cuối cùng kiểm tra xem có lỗi không
                    // Nếu có thì xuất hiện lỗi
                    if (html != '') {
                        $('#showerror').append(html);
                    } else {
                        // Thành công
                        $('#showerror').append('Thêm thành công');
                    }
                }
            });

            return false;
        });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>