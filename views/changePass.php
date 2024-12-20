
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h2>Thay đổi mật khẩu</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group"> 	
								<label>Mật khẩu cũ: (*) </label>
								<input type="password" class="form-control" name="oldPass" id='oldPass' placeholder="Nhập mật khẩu cũ" minlength=6 maxlength="100" required/> 
								<?php 
								if(isset($oldPassErr)){
									?>
									<span class="text-danger"><?=$oldPassErr?></span>
									<?php
								}
								?>
							</div>
							<div class="form-group"> 
								<label>Mật khẩu mới: (*)</label>
								<input type="password" class="form-control" name="newPass" placeholder="Nhập mật khẩu mới" minlength=6 maxlength="100" required/>
								<?php 
								if(isset($newPassErr)){
									?>
									<span class="text-danger"><?=$newPassErr?></span>
									<?php

								}
								?>
							</div>
							<div class="form-group"> 
								<label>Nhập lại mật khẩu mới: (*)</label>
								<input type="password" class="form-control" name="newPass2" placeholder="Nhập lại mật khẩu mới" minlength=6 maxlength="100" required/>
								<?php 
								if(isset($newPass2Err)){
									?>
									<span class="text-danger"><?=$newPass2Err?></span>
									<?php

								}
								?>
							</div>		
							<input type="submit" value="Chấp nhận" class="btn btn-success"> 
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thay đổi mật khẩu';
	    });
	</script>