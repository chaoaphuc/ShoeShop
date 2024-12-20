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
						<h2 align="center">Thêm sản phẩm</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="imgUpload">Hình ảnh: </label>
								<input type="file" class="form-control-file" name="imgUpload" required>
								<?php if(isset($imgErr)): ?>
									<div class="alert alert-danger" role="alert">
										<?=$imgErr?>
									</div>
								<?php endif;?>
							</div>
							<div class="form-group">
								<label for="name">Tên: </label>
								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" placeholder="Nhập tên sản phẩm" required>
							</div>
							<div class="form-group">
								<label for="gender">Giới tính: </label>
								<br/>
								<label for="male">Nam</label>
								<input type="radio" class="single-bottom" name="gender" id="male" value="Nam" checked>
								<label for="female">Nữ</label>
								<input type="radio" class="single-bottom" name="gender" id="female" value="Nữ">
							</div>
							<div class="form-group">
								<label for="types">Kiểu giày: </label>
								<select class="form-control" name="types" id="types" class="form-control">
									<option value="Giày Sneaker">Giày Sneaker</option>
									<option value="Giày Boot">Giày Boot</option>
									<option value="Giày Lười">Giày Lười</option>
									<option value="Giày Cao Gót">Giày Cao Gót</option>
									<option value="Giày Tây">Giày Tây</option>
								</select>
							</div>
							<div class="form-group">
								<label for="amount">Số lượng:</label><br/>
								<input type="number" class="form-control" name="amount" id='amount' min="1" value="1" required>
							</div>
							<div class="form-group">
								<label for="cost">Giá: (VND)</label><br/>
								<input type="number" class="form-control" name="cost" id='cost' placeholder="Nhập giá tiền" required>
							</div>
							<div class="form-group">
								<label for="describes">Mô tả: </label>
								<textarea class="form-control" name="describes" id="describes" placeholder="Nhập mô tả" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" name="add" class="btn btn-success">Thêm</button>								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Thêm sản phẩm';
	});
</script>
<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98
-->