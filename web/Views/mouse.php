<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PULSAR | Chuột </title>

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
    <link rel="stylesheet" href="../../public/CSS/sanpham.css">
</head>

<body>

    <div class="container-fluid">
        <?php
        include __DIR__ . "/nav.php";
        ?>

        <div class="container-fluid product-main">
            <div class="box-top"><br>
                <a href="/" class="product-link-top"> <strong>TRANG CHỦ</strong> \</a> <a href="/mouse" class="product-link-top">CHUỘT</a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="menu-left-tilte text-center">DANH MỤC</h4>
                        </div>
                        <?php
                        if ($data['categories']) {
                            foreach ($data['categories'] as $cc) {
                        ?>
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="/mouse"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $cc['cat_name'] ?></a></li>
                                </ul>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-9"><br>
                    <div class="mouse">
                        <div class="row">
                            <?php
                            if ($data['products']) {
                                foreach ($data['products'] as $pd) {
                            ?>
                                    <div class="col-md-3">
                                        <div class="panel panel-default prod-box">
                                            <a href="/detail?id=<?= $pd['id'] ?>" style="text-decoration: none;">
                                                <div class="panel-body">
                                                    <img src="<?= $pd['product_image'] ?>" class="img-responsive" alt="Image">
                                                    <hr>
                                                    <div class="prod-text">
                                                        <div class="prod-name">
                                                            <p> <?php echo  $pd['product_name'] ?></p>
                                                        </div><br>
                                                        <div class="prod-price" style="color:red; font-weight: 600;">
                                                            <?php echo number_format($pd['product_price'], 0)  ?> đ
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer row">
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
    </div>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>