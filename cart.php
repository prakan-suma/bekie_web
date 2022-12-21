<?php require 'header.php'; ?>

<!-- ===============Body================= -->

<main class="p-5">
    <h1>หน้าตะกร้าสินค้า </h1>
    <form action="cart_update.php" method="post">
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <button type="submit" class="btn btn-primary mr-2"> คำนวณราคาใหม่</button>
                <a href="cart_confirm.php" class="btn btn-success"> ยืนยันสั่งซื้อ</a>
            </div>
            <div class="col-5">
                <div class="d-flex justify-content-between">
                    <div>
                        ราคารวม
                    </div>
                    <div class="">xxx</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        ภาษี 7%
                    </div>
                    <div class="">xxx</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        ค่าขนส่ง
                    </div>
                    <div class="">xxx</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        ราคาสุทธิ
                    </div>
                    <div>xxx</div>
                </div>
            </div>
    </form>
</main>
<?php require 'footer.php'; ?>