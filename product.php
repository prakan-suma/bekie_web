<?php require_once 'header.php' ?>

<!-- ================================================ -->
<main class="p-5">
    <h2>ร้าน</h2>
    <h4>รายชื่อสินค้า </h4>

    <form action="product_delete.php"></form>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th> <input type="checkbox" onClick="checkAll(this)"> </th>
                        <th> ลำดับ </th>
                        <th> ชื่อสินค้า </th>
                        <th> ราคา </th>
                        <th> รูปภาพ </th>
                        <th> รายละเอียด </th>
                        <th> ขนาด(ซม.) </th>
                        <th> น้ำหนัก(กก.) </th>
                        <th> แก้ไข </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input class="check" type="checkbox" name="" value=""> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td class="text-center img-fluid"> <img src="" height="80"> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="">
            <a href="product_add.php" class="btn btn-success col-3"> เพิ่ม </a>
            <button class="btn btn-danger"> ลบรายการสินค้าทีเลือก </button>
        </div>
    </form>
</main>

<?php require_once 'footer.php'; ?>