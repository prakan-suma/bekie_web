<?php  ?>
<nav class="navbar navbar-light bg-light">

	<div class="">
		<a class="nav-item nav-link" href="index.php">ECOMMERCE</a>
	</div>

	<div>
		<a href="index.php">หน้าแรก</a>

		<?php

		// $_SESSION['auth'] คือ เอาไว้เช็คว่า user มีสถานะเป็น login อยู่หรือเปล่า
		// Session นี้จะถูกส่งมาถ้า user ไป login เข้าส้ระบบมาแล้ว
		// คำสั่ง isset คือ เอาไว้เช็คว่ามีตัวแปลนี้ประกาศมาหรือปล่าว ถ้า $_SESSION['auth'] 
		// มีการประกาศมา จะเข้าเงื่อนไขแรก
		if (isset($_SESSION['login'])) {

			// ifที่ 2 นี้คือ ถ้า ปรถเภท user คือ ผู้ซื้อ หรือ custommer จะแสดงหน้าเมนูข้างใน if ตัวนี้
			
			//ถ้าลง else แสดงว่า user type คือ ผู้ขาย หรือ seller จะแสดงเมนูที่อยู่ใน else
			if (user('type') == 'customer') {
			?>
				<a href="customer.php" class="">ข้อมูลลูกค้า</a>
				<a href="customer_purchase.php" class="">รายการใบสั่งซื้อ</a>
				<a href="cart.php" class="">ตะกร้าสินค้า</a>
			<?php
			} else {
			?>
				<a href="seller_profile.php" class="">ข้อมูลร้านค้า</a>
				<a href="seller_purchase.php" class="">รายการใบสั่งซื้อ</a>
				<a href="seller_product.php" class="">สินค้า</a>
			<?php
			}
		}
		?>

	</div>


	<div>

		<?php

		// เช็คว่า session auth หรือ สถานะ login ถูกประกาศมาหรือเปล่า ถ้ามีแสดงว่ามี การ login เข้าสู่ระบบมาแล้ว
		
		//ถ้ามีสถานะ login มาจริง ในส่วนตัวลิ้งด้านขวา ให้แสเง ปุ่ม login และชื่อผู้ใช้เท่านั้น		

		//ถ้าลง else ก็แสดงว่า ตัว session auth ไม่มีการประกาศมา หรือ ไมได้มีการ login นัั้นเอง และจะแสดง ลิ้ง ที่อยู่ใน else
		if (isset($_SESSION['auth'])) {
		?>
			<span class=""><?= user('username'); ?></span>
			<a href="logout.php" class=" ">ออกจากระบบ</a>
		<?php
		} else {
		?>
			<a href="register_customer.php" class="mr-4">ร่วมลงขาย</a>
			<a href="register_customer.php" class="mr-4">ลงทะเบียนซื้อสินค้า</a>
			<a href="login.php">ลงชื่อเข้าใช้</a>
		<?php
		}
		?>
	</div>

</nav>