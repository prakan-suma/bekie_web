<?php include 'header.php' ?>

<!-- body code goes here -->
<session>

	<div>
		<div class="p-5">

			<h4 class="text-center mb-4 font-weight-bold">Login</h4>

			<?= alertShow() ?>
			
			<form action="auth.php" method="post">
				<div>
					<input class="form-control mb-2" name="username" type="text" required placeholder="ชื่อผู้ใช้งาน">
				</div>
				
				<div>
					<input class="form-control mb-4" type="password" required  name="password" placeholder="รหัสผ่าน">
				</div>
				
				<button class="btn btn-outline-primary btn-block" type="submit">บันทึก</button>
				
			</form>
		</div>
	</div>
</session>

<?php
include 'footer.php';
?>