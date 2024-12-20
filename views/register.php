

	<!--container-->	
	<div class="container">
		<div class="col-md-6 offset-3">
			<div class="card">
			<div class="card-header">
				<h2>Đăng ký</h2>
			</div>
			<div class="card-body">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="form-group">	
						<label>Tên đăng nhập: (*)</label>
						<input type="text" class="form-control" name="username" id="username" required minlength=6 maxlength="50" placeholder="Nhập tên đăng nhập">
							<?php if (isset($usernameErr)):?>
								<span class='text-danger'><?=$usernameErr?></span>
							<?php endif ?>
					</div>
					<div class="form-group"> 	
						<label>Họ tên: (*)</label>
						<input type="text" class="form-control" name="name" id="name" required minlength=10 maxlength="50" placeholder="Nhập họ tên">

						<?php if (isset($nameErr)):?>
								<span class='text-danger'><?=$nameErr?></span>
						<?php endif; ?>

					</div>
					<div class="form-group"> 	
						<label>Email: (*)</label>
						<input type="email" class="form-control" name="email" id="email" required maxlength="100" placeholder="Nhập địa chỉ email">

						<?php if (isset($emailErr)):?>
								<span class='text-danger'><?=$emailErr?></span>
						<?php endif ?>
						
					</div>
					<div class="form-group"> 
						<label >Mật khẩu: (*)</label>
						<input type="password" class="form-control" name="pass" id="pass" required minlength=6 maxlength="100" placeholder="Nhập mật khẩu">
						<?php if (isset($passErr)):?>
								<span class='text-danger'><?=$passErr?></span>
						<?php endif ?>
					</div>
					<div class="form-group"> 
						<label >Nhập lại mật khẩu: (*)</label>
						<input type="password" class="form-control" name="pass2" id="pass2" required minlength=6 maxlength="100" placeholder="Nhập lại mật khẩu">
						<?php if (isset($pass2Err)):?>
								<span class='text-danger'><?=$pass2Err?></span>
						<?php endif ?>
					</div>
					<input type="submit" value="Đăng ký" class="btn btn-success">
				</form>
				</div>
			</div>
		</div>
		<!-- end register  -->
	</div>
	<!--end container-->