<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN | Trang chủ</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../public/CSS/admin.css">
</head>

<body>

    <div class="container">

        <div class="row card">

            <div class="logo-card">
                <img src="../../../public/Image/Logo.png" alt="" width="100%">
            </div>

            <?php
            include __DIR__ . "/adminNav.php";
            ?>

            <div class="col-md-9">

                <div class="card2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:#fff; background-color: #0080FF;">
                            <div class="row">
                                <h3 class="col-md-9">DANH SÁCH SẢN PHẨM</h3>
                                <a href="/admin/add-product" class="btn btn-default col-md-2" style="margin-top:10px;color:#0080FF; background-color:#fff"> Thêm mới </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Product</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($data) {
                                        $i = 0;
                                        foreach ($data as $product) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $product['product_name'] ?></td>
                                                <td>
                                                <img style="width:84px; height:70px" src="<?= $product['product_image'] ?>" class="img-responsive">
                                                </td>
                                                <td><?= number_format($product['product_price'], 0) ?> đ</td>
                                                <td><?= $product['product_description'] ?></td>
                                                <td>
                                                    <a  class="btn btn-default" href="/admin/updateprod?id=<?= $product['id'] ?>"><i class="fa-solid fa-gear" style="color: #009611;"></i></a>
                                                    
                                                    <a onclick="return confirm('Bạn chắc chắn muốn xoá sản phẩm: <?=$product['product_name'] ?>?')" class="btn btn-default" href="/admin/deleteprod?id=<?= $product['id'] ?>"><i class="fa-solid fa-trash" style="color: #c20000;"></i></i></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>

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