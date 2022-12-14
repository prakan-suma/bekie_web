<?php include 'header.php' ?>

<!-- body code goes here -->
<div class="ct">
	
	<h2>ร้าน <?= user('shop_name') ?></h2>
	<h4> รายชื่อสินค้า </h4>

	<?= alert() ?>

	<form action="product_delete.php" method="post">
		<div class="mb-2">
			<button class="btn text-danger"> ลบ </button>
			<a href="product_add.php" class="btn "> เพิ่มสินค้า <ion-icon name="add-outline"></ion-icon> </a>
		</div>

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
					<?php
					$sql = "select * from product where seller_id  = '{$_SESSION['user']['id']}' ";
					$products = get($sql);
					$i = 0;
					foreach ($products as $p) {
					?>

						<tr>
							<td> <input class="check" type="checkbox" name="id[]" value="<?= $p['id'] ?>"> </td>
							<td> <?= ++$i ?> </td>
							<td> <?= $p['name'] ?> </td>
							<td> <?= $p['price'] ?> </td>
							<td class="text-center img-fluid"> <img src="upload_picture/<?= $p['picture'] ?>" height="80"> </td>
							<td> <?= $p['detail'] ?> </td>
							<td> <?= $p['box_width'] ?> x <?= $p['box_height'] ?> x<?= $p['box_long'] ?> </td>
							<td> <?= $p['box_weight'] ?> </td>
							<td> <a href="product_edit.php?id=<?= $p['id'] ?>" class=" btn text-warning"> แก้ไข </a> </td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</form>
</div>

<?php
include 'footer.php';
?>