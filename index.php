<?php include 'header.php' ?>

<!-- body code goes here -->
<section class="p-5">

	<div class="mb-5">
		<form class="form-inline" action="search.php" method="post">
			<div>
				<input class="form-control mr-2" type="text" name="keyword" placeholder="ค้นหา">
				<button type="submit" class="btn btn-primary"> ค้นหา </button>
			</div>
		</form>
	</div>

	<!-- function ที่ เอาไว้เจอ error  -->
	<?= alertShow() ?>


	<div>
		<h4>สินค้าขายดี</h4>

		<?php

		// ดึงข้อมูลจากตาราง product ทั้งหมด , นับ(product_id) ใส่ Column ใหม่ ชื่อ cnt 
		// ตาราง purchase_list ชื่อใหม่ว่า l 
		// ต่อตาราง product ชื่อใหม่ว่า p โดย p.id = l.product_id
		// groupข้อมูล ด้วย products_id **GROUP BY คือการจัดกลุ่มคำที่ซ้ำกันให้แสดงแค่คำเดียว หรือการจัดกลุ่มของคำซ้ำกันให้รวมกลุ่มกัน โดยจะมีการเรียงลำดับตามตัวอักษร**
		//order ด้วย column cnt และ เรียงจากมากไปน้อย **ORDER BY เป็นคำสั่งที่ใช้เรียงข้อมูลที่ไม่เป็นระเบียบในตาราง โดยจะเรียงลำดับจากมากไปหาน้อย หรือ น้อยไปหามากก็ได้ และ DESC คือการกำหนดจาก มาก > น้อย**

		//limit **เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตาราง** | 0,10 = เอาข้อมูลลำดับที่ 0 - 10  

		$sql = "SELECT p.* , COUNT(l.product_id) as cnt
						FROM purchase_list l
						inner join product p on p.id = l.product_id
						GROUP by l.product_id
						order by cnt desc
						LIMIT 0 , 10";

		//$best_products คือ get($sql); คือ ใช้ฟังชั้น get() ในการดึงข้อมูลมาใส่ไว้ใน ตัวแปล $best_products
		$best_products = get($sql);

		//$best_ids = [] คือ ประกาศตัวแปล $best_ids เก็บค่า Array ว่างๆ ไว้ก่อน
		$best_ids = [];

		//foreach คือ for ที่ใช้ในการ วน loop array ในคัวแปลที่ใส่มา ไม่ต้องกำหนดจำนวนรอบเพราะมันทำการ loop ข้อมูลใน array ถ้า loop ข้อมูลใน array นั้นหมดแล้วก็จะจบการทำงาน

		foreach ($best_products as $p) {

			//array_push() คือ เพิ่ม $p['id'] เข้าไปใน $best)ids ประกาศ
			array_push($best_ids, $p['id']);
		?>
			<div>
				<div>
					<div class="text-center">
						<img src="upload_picture/<?= $p['picture'] ?>" height="150" width="150">
					</div>
					<div class="pt-1"> <?= $p['name'] ?> </div>

					<div class="pt-1 pb-2 pr-4">

						<div class="tx-g">ราคา : <?= $p['price'] ?> บาท </div>
						<div>
							<?php

							//ถ้า user type ไม่ใช่ seller จะไม่ขึ้นปุ่มสั่งซื้อ
							if (user('type') != 'seller') {
							?>
								<a class="li-inf" href="cart_add.php?id=<?= $p['id'] ?>"> สั่งซื้อ</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>


	<!-- รายการสินค้า  -->
	<section>
		<h4>รายการสินค้า</h4>

		<div class="row">
			<?php

			$perpage = 20;

			//(empty($_GET['page'])) ? 1 : $_GET['page']; เป็นการเขียน if แบบ short if 

			// (condition ? true : false);

			//ถ้า $_GET['page'] ว่างไม่มีข้อมูลข้างใน จะมีค่าเป็น 1 ถ้า false  $_GET['page'] จะเป็นเลขของหน้านั้นๆ
			$page = (empty($_GET['page'])) ? 1 : $_GET['page'];

			//เอาไว้คำนวณ แถวเริ่มต้น ในการทำตัวแบ่งหน้า
			//$perpage คือ จำนวนแถวที่ต้องการแสดงต่อ 1 หน้า $page คือ เลขหน้า
			//สมุติว่า $perpage = 15 หมายถึง 1 หน้าต้องการให้แสดง 15 แถว

			//สมการ จะหาแถวเริ่มต้น ก็เอา  $perpage * $page - $perpage ; ก็จะได้ แถวเริ่มต้นที่จะต้องแสดง
			// (1*15)-20 = 0 , (2*15)-20 = 15;
			$start = $perpage * $page - $perpage;

			$sql = "select * from product";

			//ถ้า $best_ids ไม่ว่าง หรือมีข้อมูลอยู่ข้างใน
			if (!empty($best_ids)) {
				
				// implode คือการ แยกข้อมูลเป็น คำๆ จากเมื่อเจอ ,
				// เช่นถ้าใน array ของมีข้อมูลแบบนี้ best_ids['1','2','3','4','5'];
				// ถ้าทำการ implode(',', $best_ids);
				// ผลลัพ จะเป็น '1' '2' '3' '4' '5' จะออกมาเป็น string เพราะในข้อมูลใน array ไม่ใช่ string
				$best_ids = implode(',', $best_ids);

				$sql = "where id not in($best_ids) ";
			}
			
			$all = get($sql);

			
			$pages = ceil(count($all) / $perpage);

			$sql .= " limit $start,$perpage ";
			$products = get($sql);
			foreach ($products as $p) {
			?>

				<div class="col-3">
					<div>
						<div>
							<img src="upload_picture/<?= $p['picture'] ?>" height="150" width="150" >
						</div>
						<div class="pt-1 "> <?= $p['name'] ?> </div>

						<div class="py-2">
							<div class="tx-g">ราคา : <?= $p['price'] ?> บาท </div>
							<div class="">
								<?php
								if (user('type') != 'seller') {
								?>
									<a class="btn btn-block btn-info" href="cart_add.php?id=<?= $p['id'] ?>"> สั่งซื้อ</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</section>


	<nav aria-label="Page navigation example">
		
	<!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
		<ul class="pagination dsd">
			<li class="page-item">
				<a class="btn-ac-link" href="index.php?page=1" aria-label="Previous">
					<!-- <span aria-hidden="true">&laquo;</span> -->
					<ion-icon name="chevron-back-outline"></ion-icon>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<?php
			for ($i = 1; $i <= $pages; $i++) {
			?>
				<li class="page-item ml-1 mr-1"> <a class="btn-ac-link" href="index.php?page=<?= $i ?>"> <?= $i ?> </a> </li>
			<?php
			}
			?>
			<li class="page-item">
				<a class="btn-ac-link" href="index.php?page=<?= $lastpage ?>" aria-label="Next">
					<!-- <span aria-hidden="true">&raquo;</span> -->
					<ion-icon name="chevron-forward-outline"></ion-icon>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</nav>

</section>
<?php
include 'footer.php';
?>