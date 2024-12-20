<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h2>Đăng nhập</h2>
					</div>
					<div class="card-body">
						<?php
							if(isset($verifiErr)){
								?>
									<div class="alert alert-danger" role="alert">
									  <?=$verifiErr?>
									</div>
								<?php
							}
						?>
					<form action="" method="POST">
						<div class="form-group"> 	
							<label>Tài khoản / Email: (*) </label>
							<input type="text" class="form-control" name="login" id='login' placeholder="Nhập tài khoản / email" minlength=6 maxlength="50" required/> 
							<?php 
								if(isset($loginErr)){
									?>
									<span class="text-danger"><?=$loginErr?></span>
									<?php
								}
							?>
						</div>
						<div class="form-group"> 
							<label>Mật khẩu: (*)</label>
							<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" minlength=6 maxlength="100" required/>
							<?php 
								if (isset($passErr)) {
									?>
									<span class="text-danger"><?=$passErr?></span>
									<?php

								}
							?>
						</div>			
						<input type="submit" value="Đăng Nhập" class="btn btn-success"> 
					</form>
					</div>
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>