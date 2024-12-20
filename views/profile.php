
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h2 align="center">Thông tin cá nhân</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" >
							<div class="form-group">
								<label for="name">Họ tên: </label>
								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="50">
							</div>
							<div class="form-group">
								<label for="username">Tài khoản: </label>
								<input type="text" class="form-control" name="username" id='username' disabled>
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" class="form-control" name="email" id='email' disabled>
							</div>
							<div class="form-group">
								<label >Giới tính: </label><br/>
								<label for="male"><input type="radio" class="single-bottom" name="sex" id="male" value="Nam">Nam</input></label>
								<label for="female"><input type="radio" class="single-bottom" name="sex" id="female" value="Nữ">Nữ</input></label>
							</div>
							<div class="form-group">
								<label for="birthday">Ngày sinh: </label>
								<input type="date" class="form-control" name="birthday" id="birthday" min="1920-01-01" max="2019-01-04">
							</div>
							<div class="form-group">
								<label for="phone">Số điện thoại: </label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" maxlength="15">
							</div>
							<div class="form-group">
								<label for="address">Địa chỉ: </label>
								<textarea class="form-control" name="address" id="address" placeholder="Nhập địa chỉ"></textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<button type="submit" class="btn btn-success btn-md">Cập nhật</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thông tin cá nhân';
	    });
	</script>