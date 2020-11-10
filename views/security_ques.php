<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quên mật khẩu</title>
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary" style="background-image: url('../images/background_image_login.jpg');">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Phục hồi mật khẩu</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Điền thông tin của bạn</div>
                                        <form method="POST" action="../DAO/processPassRecovery.php">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Câu hỏi</label>
                                                <input class="form-control py-4" name="inputQuestion" id="inputQuestion" type="text" placeholder="Điền câu hỏi" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Trả lời</label>
                                                <input class="form-control py-4" name="inputAnswer" id="inputAnswer" type="text" placeholder="Điền câu trả lời" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Quay lại</a>                                                
                                                <input class="btn btn-primary" type="submit" value="Cài lại mật khẩu">
                                            </div>
                                            <input type="hidden" name="phase" value="2">
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Bạn chưa có tài khoản? Đăng ký!</a></div>
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
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
