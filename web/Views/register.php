<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PULSAR | Đăng ký</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../public/CSS/nav.css">
    <link rel="stylesheet" href="../../public/CSS/footer.css">
    <link rel="stylesheet" href="../../public/CSS/dangky.css">
</head>

<body>

    <div class="container">
        <?php
        include __DIR__ . "/nav.php";
        ?>
        <div class="login-form">
            <div class="container">
                <div class="row card">
                    <div class="col-md-5 left">
                        <div class="image-login">
                            <img src="https://pbs.twimg.com/media/FRCjtINaIAAZWwc.jpg:large" alt="" width="100%" height="650px">
                        </div>
                    </div>
                    <div class="col-md-7 right">
                        <h4 class="text-center">ĐĂNG KÝ</h4>

                        <form action="/register" method="POST">
                            <p class="text-center" style="color: red;font-size:16px">
                                <?php
                                if (isset($data["message"])) {
                                    echo $data["message"];
                                }
                                ?>
                            </p>
                            <div class="form-group">
                                <input type="text" class="form-control form-input" id="" placeholder="Họ và tên" name="fullname" values='<?= isset($data['fullname']) ? $data['fullname'] : ""  ?>'>
                                <input type="email" class="form-control form-input" id="" placeholder="Email" name="email" values='<?= isset($data['email']) ? $data['email'] : ""  ?>'>
                                <input type="password" class="form-control form-input" id="" placeholder="Mật khẩu" name="password">
                                <input type="password" class="form-control form-input" id="" placeholder="Xác nhận mật khẩu" name="confirmPasword">
                            </div>
                            <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
                            <hr>
                            <div class="text-center2 mb-2">
                                <a href="/login" class="register-link">
                                    Đăng nhập ngay!
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>PULSAR</h4>
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Chuột</a></li>
                        <li><a href="#">Bàn di - Phụ kiện</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                        <li><a href="#">Về chúng tôi</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Tài khoản</h4>
                    <ul>
                        <li><a href="#">Đăng nhập</a></li>
                        <li><a href="#">Đăng kí</a></li>
                        <li><a href="#">Quên mật khẩu</a></li>

                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Địa chỉ</h4>
                    <ul>
                        <li><a href="#">288 Nguyễn Văn Linh, phường An Khánh, Ninh Kiều, Cần Thơ</a></li>
                        <li><a href="">Số điện thoại: 0762837xxx</a></li>
                        <li><a href="">Email: thinhtlppc04491@fpt.edu.vn</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Các nền tảng khác</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>