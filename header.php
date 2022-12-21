<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COMMERCE</title>
    <link rel="stylesheet" href="css/bootstrap-4.3.1.css" >
    <link rel="stylesheet" href="css/main.css?v=1.1">
</head>

<body>

    <!-- navbar ------------------------- -->
    <nav class="d-flex p-3">
        <div><a class="font-weight-bold">E-COMMERCE</a> </div>
        <div class="m-auto">
            <a href="index.php" class="mx-2">หน้าแรก</a>
            <a href="customer_profile.php" class="mx-2">ข้อมูลของคุณ</a>
            <a href="customer_purchase.php" class="mx-2">รายการใบสั่งซื้อ</a>
            <a href="cart.php" class="mx-2">ตะกล้าสินค้า</a>
            <a href="seller_profile.php" class="mx-2">ร้านของคุณ</a>
            <a href="seller_purchase.php" class="mx-2">ใบรายการสั่งซื้อ</a>
            <a href="product.php" class="mx-2">สินค้า</a>
        </div>

        <div class="d-flex">
            <div class="dropdown">

                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    สมัครสมาชิก
                </a>

                <!-- dropdown  -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="customer_register.php">เป็นผู้ซื้อสินค้า</a>
                    <a class="dropdown-item" href="seller_register.php">ร่วมลงขายสินค้ากับเรา</a>

                </div>

            </div>

            <a href="login.php" class="mx-2">เข้าสู่ระบบ</a>
        </div>
    </nav>