<?php
if (!isset($_SESSION['user'])) {
    $message = '<a href="#" onclick=" return confirm("Vui lòng đăng nhập để xem giỏ hàng của bạn !")"></a>';
    header("Location: /login");
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PULSAR | Giới thiệu</title>

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
    <link rel="stylesheet" href="../../public/CSS/giohang.css">
</head>

<body>

    <div class="container-fluid">
        <?php
        include __DIR__ . "/nav.php";
        ?>

        <div class="container" style="margin-top:120px;">
            <div class="row">

                <div class="col-sm-12 col-md-12 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th class="text-center">Mức giá</th>
                                <th class="text-center">Số lượng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data) {
                                foreach ($data as $cart) {
                                    // var_dump($cart);
                            ?>
                                    <tr>
                                        <td class="col-md-10">
                                            <div class="media">
                                                <a class="thumbnail pull-left" href="#" style="margin-right:20px">
                                                    <img class="media-object" src="<?= $cart['product_image'] ?>" style="width: 64.6px;height: 80px; ">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading" style="color:#0080FF;margin-top:28px"><?= $cart['product_name'] ?> </h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1 text-center">
                                            <h4><?= number_format($cart['product_price'], 0) ?> vnđ</h4>
                                        </td>
                                        <td class="col-md-1 text-center">
                                            <h5>Số lượng : <?= $cart['quantity'] ?></h5>
                                        </td>
                                        <td class="col-md-1">
                                                <a class="btn btn-danger" href="/deletecart?id=<?= $cart['id'] ?>">Xoá</a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td></td>

                                <?php
                                if (isset($_SESSION['user'])) {
                                    foreach ($_SESSION['user'] as $user) {
                                ?>
                                        <h4>DANH SÁCH ĐƠN HÀNG</h4>

                                        <h4> <strong><i><?= $user['fullname'] ?></i></strong> </h4>
                                        <hr>
                                <?php
                                    }
                                } ?>
                            </tr>
                           
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <a href="/mouse" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                    </a>
                                </td>
                                <td>
                                    <a href="#" type="button" class="btn btn-success" style="background-color:#0080FF">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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