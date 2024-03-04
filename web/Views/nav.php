<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a href="/"><img src="public/Image/Logo.png" alt=""></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['user'])) {
            foreach ($_SESSION['user'] as $user) {
        ?>
                <li class="dropdown nav-item">
                    <a href="" class="dropdown-toggle nav-item-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $user['fullname'] ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($user['role'] == 1) {
                        ?>
                            <li><a href="/admin">TRANG QUẢN TRỊ</a></li>
                        <?php
                        }
                        ?>
                        <li><a href="/logout">ĐĂNG XUẤT</a></li>
                    </ul>
                </li>
            <?php
            }
        } else {
            ?>
            <li class="dropdown nav-item">
                <a href="" class="dropdown-toggle nav-item-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa-regular fa-user"></i> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/login">ĐĂNG NHẬP</a></li>
                    <li class="divider"></li>
                    <li><a href="/register">ĐĂNG KÝ</a></li>
                </ul>
            </li>

        <?php
        }
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item"><a class="nav-item-link" href="/mouse">SẢN PHẨM</a></li>
        <!-- <li class="nav-item"><a class="nav-item-link" href="/pad">BÀN DI CHUỘT - PHỤ KIỆN</a></li> -->
        <li class="nav-item"><a class="nav-item-link" href="/help">HỖ TRỢ</a></li>
        <li class="nav-item"><a class="nav-item-link" href="/introduce">VỀ CHÚNG TÔI</a></li>
        <li class="nav-item"><a class="nav-item-link" href="/cart">ĐƠN MUA</a></li>
    </ul>
</nav>