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
                            <h3>DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) {
                                        $i = 0;
                                        foreach ($data as $User) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $User['fullname']; ?></td>
                                                <td><?= $User['email']; ?></td>

                                                <?php
                                                if ($User['role'] == 1) {
                                                ?>
                                                    <td>Quản trị viên</td>
                                                <?php
                                                } else if($User['role'] == 0){
                                                    ?>
                                                    <td>Khách hàng</td>
                                                <?php  
                                                }
                                                ?>
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