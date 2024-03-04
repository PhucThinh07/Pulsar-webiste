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
    <link rel="stylesheet" href="../../public/CSS/sanphamchtiet.css">
</head>

<body>

    <div class="container-fluid">
        <?php
        include __DIR__ . "/nav.php";
        ?>
        <div class="container">
            <div class="product-detail" style="margin-top: 100px;">
                <?php
                if ($data['list']) {
                    foreach ($data['list'] as $product) {
                ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="img-product-detail">
                                    <img width="80%" style="margin:auto" src="<?= $product['product_image'] ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="content-product">
                                    <h1 style="color: #0080FF;"><?= $product['product_name'] ?></h1>
                                    <h3><?php
                                        if (isset($data['cats'])) {
                                            foreach ($data['cats'] as $ct) {
                                        ?>
                                                <h4> Danh mục: <strong><?= $ct['cat_name'] ?></strong></h4>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </h3>
                                    <hr>
                                    Giá sản phẩm: <h3 class="text-center" style="color:crimson;font-weight:700"><?= number_format($product['product_price'], 0) ?> đ</h3>

                                    <form action="/add-cart" method="POST">

                                        <div class="form-group">
                                            <input type="hidden" value="<?= $product['id']  ?>" name="product_id">
                                            <label for="">Số lượng: </label>
                                            <input type="number" value="1" min="1" class="form-control" id="" name="quantity">
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="appearance: none;
  backface-visibility: hidden;
  background-color: #2f80ed;
  border-radius: 10px;
  border-style: none;
  box-shadow: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-size: 15px;
  font-weight: 500;
  height: 50px;
  letter-spacing: normal;
  line-height: 1.5;
  outline: none;
  overflow: hidden;
  padding: 14px 30px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transform: translate3d(0, 0, 0);
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: top;
  white-space: nowrap;
  margin-left:170px;
  margin-top:15px;
  margin-bottom:20px;
  ">Thêm giỏ hàng</button>
                                    </form>


                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        CHI TIẾT SẢN PHẨM
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body" style="font-size: 14px;">
                                                    <?= $product['product_description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="panel panel-default text-center">
                                                        <div class="panel-heading">
                                                            <div class="intro-image">
                                                                <img src="../../public/Image/intro/truck.png" alt="" width="30%">
                                                            </div> <br>
                                                            GIAO HÀNG TRÊN TOÀN QUỐC
                                                        </div>
                                                        <div class="panel-body" style="height:150px;text-align:justify ;">
                                                            Thời gian giao hàng linh động từ 3 - 4 - 5 ngày tùy khu vực, đôi khi sẽnhanh hơn hoặc chậm
                                                            hơn.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="panel panel-default text-center">
                                                        <div class="panel-heading">
                                                            <div class="intro-image">
                                                                <img src="../../public/Image/intro/money-back.png" alt="" width="30%">
                                                            </div><br> CHÍNH SÁCH ĐỔI TRẢ HÀNG
                                                        </div>
                                                        <div class="panel-body" style="height:150px;text-align:justify ;">
                                                            Sản phẩm được phép đổi hàng trong vòng 36h nếu phát sinh lỗi từ nhà sản
                                                            xuất
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="panel panel-default text-center">
                                                        <div class="panel-heading">
                                                            <div class="intro-image">
                                                                <img src="../../public/Image/intro/search.png" alt="" width="30%">
                                                            </div> <br> KIỂM TRA - NHẬN ĐƠN HÀNG
                                                        </div>
                                                        <div class="panel-body" style="height:150px;text-align:justify ;">
                                                            Được phép kiểm hàng trước khi thanh toán. Khi
                                                            nhận hàng,
                                                            vui lòng quay video đơn hàng.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

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