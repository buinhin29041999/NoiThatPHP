<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng nhập</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('images/background_image_login.jpg');">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="background-color: transparent;">
                                <div class="card-header" style="color: white;">
                                    <h3 class="text-center font-weight-light my-4">Đăng nhập</h3>
                                    <?php
                                    include('DAO/connect.php');
                                    if (!isset($_COOKIE[$cookie_usr])) {
                                        echo "Cookie named '" . $cookie_usr . "' is not set!";
                                    } else {
                                        echo "Cookie '" . $cookie_usr . "' is set!<br>";
                                        echo "Value is: " . $_COOKIE[$cookie_usr];
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <form action="DAO/processLogin.php" method="POST">
                                        <div class="form-group">
                                            <label class="medium mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" style="background-color:#f2f2f2;" name="inputEmailAddress" type="email" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="medium mb-1" for="inputPassword">Mật khẩu</label>
                                            <input class="form-control py-4" style="background-color:#f2f2f2;" name="inputPassword" type="password" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" name="rememberPasswordCheck" type="checkbox" value="1" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Ghi nhớ mật khẩu</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html" style="color: black;">Quên mật khẩu?</a>
                                            <input type="submit" class="btn btn-primary" value="Đăng nhập">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="medium"><a href="register.html" style="color: black;">Bạn chưa có tài khoản ? Đăng ký!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>