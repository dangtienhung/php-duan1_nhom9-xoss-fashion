<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XOSS || Fashion</title>

    <!-- faviicon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- gg font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="public/layout/css/style.css">
    <link rel="stylesheet" href="public/layout/css/reponsive.css">
</head>

<body>
    <div class="regis__container">
        <form action="?url=check_register.php" method="post" class="regis__main">
            <?php if(isset($_SESSION['error_register_user'])) { ?>
                <h3 style="color: red"><?php echo $_SESSION['error_register_user'];?></h3>
            <?php } $_SESSION['error_register_user']= ""; ?>
            <!-- role -->
            <input type="number" name="role" value="3" hidden>

            <div class="regis__box">
                <label for="" class="regis__title">Email</label> <br>
                <input type="email" name="email" id="" class="regis__input">
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Tên đăng nhập</label> <br>
                <input type="text" name="name" id="" class="regis__input">
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Địa chỉ</label> <br>
                <input type="text" name="address" id="" class="regis__input">
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Số điện thoại</label> <br>
                <input type="text" name="phone_number" id="" class="regis__input">
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Mật khẩu</label> <br>
                <input type="password" name="password" id="" class="regis__input">
            </div>
            <div class="regis__box">
                <label for="" class="regis__title">Lưu mật khẩu</label><br>
                <input type="password" name="rp_password" id="" class="regis__input">
            </div>
            <input type="submit" value="Đăng kí" name="btn_register" class="regis__sub"><br>
            <a href="?url=login.php" class="log__a">
                <p>Đăng nhập ngay</p>
            </a>
        </form>
    </div>
</body>
<!-- jquey -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- slick slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

<!-- javascript -->
<script src="public/layout/javascript/slick-slider.js"></script>
<script src="public/layout/javascript/main.js"></script>

</html>