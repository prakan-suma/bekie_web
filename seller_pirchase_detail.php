<?php require_once 'header.php' ?>

<!-- ================================================ -->
<main class="p-5">

    <h2> ใบสั่งซื้อ </h2>
    <div class="row">
        <div class="col-md-2 offset-md-7"> เลขที่ใบสั่งซื้อ </div>
        <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-7"> วันที่สั่งซื้อ </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-7"> ผู้ซื้อ </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th> รหัสสินค้า </th>
                    <th> ชื่อสินค้า </th>
                    <th> ราคา </th>
                    <th> จำนวน </th>
                    <th> ราคารวม </th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>name</td>
                    <td>price</td>
                    <td>amount </td>
                    <td>total</td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-md-1 offset-md-7">
                ราคารวม
            </div>
            <div class="col-md-2 text-right">total</div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-7">
                ภาษี 7%
            </div>
            <div class="col-md-2 text-right">vat</div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-7">
                ค่าขนส่ง
            </div>
            <div class="col-md-2 text-right">slipping price</div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-7">
                ราคาสุทธิ
            </div>
            <div class="col-md-2 text-right">net price</div>
        </div>
    </div>
</main>
<?php require_once 'footer.php'; ?>