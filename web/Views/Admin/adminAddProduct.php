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
    <script src="https://cdn.tiny.cloud/1/2315hl2qlmeu7b5ynjo5bmkpsdv1wsfdvxhnbvftbz875w0c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
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
                            <h3>THÊM SẢN PHẨM</h3>
                        </div>
                        <div class="panel-body">


                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php
                                        if (isset($data["message"])) {
                                            echo $data["message"];
                                        }
                                        ?>
                                    </div>
                                    <form action="/admin/post-product" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tên sản phẩm</label>
                                                    <input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="product_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Hình sản phẩm</label>
                                                    <input type="file" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="image">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Giá sản phẩm</label>
                                                    <input type="text" class="form-control" id="" placeholder="Nhập giá sản phẩm" name="product_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Danh mục </label> <br>

                                                    <select name="cat_id" id="input" class="form-control" required="required">
                                                        <?php
                                                        if (isset($data['cats'])) {
                                                            foreach ($data['cats'] as $ct) {
                                                        ?>
                                                                <option value="<?= $ct['id'] ?>"><?= $ct['cat_name'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Mô tả sản phẩm </label> <br>
                                                <div class="form-group">
                                                    <textarea id="mytextarea" name="product_description" class="form-control" rows="7"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" style="background-color:#0080FF">Đồng Ý</button>
                                                <a href="/admin" type="submit" class="btn btn-danger" style="background-color:#fff;color:#c20000;">Huỷ</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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