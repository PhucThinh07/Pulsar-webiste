<div class="col-md-3">

    <div class="panel panel-default">
        <div class="panel-body">
            <h3 style="color:#0080FF">TRANG QUẢN TRỊ</h3>
            <?php
        if (isset($_SESSION['user'])) {
            foreach ($_SESSION['user'] as $user) {
                echo $user['fullname'];
            }
        }
        ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" style="color:#fff; background-color: #0080FF;">
            <h3 class="panel-title text-center" style="font-size: 16px; font-weight: 600;">DANH MỤC QUẢN LÝ
            </h3>
        </div>
        <div class="panel-body">
            <a href="/admin/category" style="font-size: 16px; font-weight: 600;">Danh mục</a>
        </div>
        <div class="panel-body">
            <a href="/admin" style="font-size: 16px; font-weight: 600;">Sản phẩm</a>
        </div>
        <div class="panel-body">
            <a href="/admin/user" style="font-size: 16px; font-weight: 600;">Khách hàng</a>
        </div>
        <div class="panel-body">
            <a href="/" style="font-size: 16px; font-weight: 600;">Về trang chủ</a>
        </div>
    </div>
</div>