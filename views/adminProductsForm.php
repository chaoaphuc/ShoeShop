<?php 
if(isset($data) && $data != false): 
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h2 align="center">Thông tin sản phẩm</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="id">ID: </label>
								<input type="text" class="form-control" name="id" id='id' minlength="6" maxlength="100" value="<?=$data['id']?>" disabled>
							</div>
							<div class="form-group">
								<label for="img">Hình ảnh: </label>
								<div class="img-detail" >
									<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>"/>
								</div>
								<br>
								<input type="file" class="form-control-file" name="imgUpload" >
								<?php if(isset($imgErr)): ?>
									<div class="alert alert-danger" role="alert">
										<?=$imgErr?>
									</div>
								<?php endif;?>
								<br>
								<input type="text" class="form-control" name="img" id='img' minlength="2" maxlength="100" value="<?=$data['img']?>" required>
							</div>
							<div class="form-group">
								<label for="name">Tên : </label>

								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$data['name']?>" required>
							</div>
							<div class="form-group">
								<label for="gender">Giới tính: </label>
								<label for="male">Nam</label>
								<input type="radio" class="single-bottom" name="gender" id="male" value="Nam">
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
								<label for="cost">Giá: (VND)</label><br/>
								<input type="text" class="form-control" name="cost" id='cost' value="<?=$data['cost']?>" required>
							</div>
							<div class="form-group">
								<label for="amount">Số lượng:</label><br/>
								<input type="number" class="form-control" name="amount" id='amount' min="1" value="<?=$data['amount']?>" required>
							</div>
							<div class="form-group">
								<label for="describes">Mô tả: </label>
								<textarea class="form-control" name="describes" id="describes" placeholder="Nhập mô tả" required value=""></textarea>
							</div>
							<div class="form-group">
								<label for="phone">Thời gian nhập hàng: </label>
								<?php $dateCr = date_create($data['crtime']);
								$dateCr = date_format($dateCr, ' H:i:s \, d-m-Y');
								echo $dateCr; ?>
							</div>
							<div class="form-group">
								<label for="phone">Thời gian lần cuối sửa sản phẩm: </label>
								<?php $dateUp = date_create($data['updateTime']);
								$dateUp = date_format($dateUp, ' H:i:s \, d-m-Y');
								echo $dateUp; ?>
							</div>
							<div class="form-group">
								<button type="submit" name="update" class="btn btn-success">Sửa</button>
								<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
									if(strcmp($data['gender'], 'Nam') == 0){
										echo "<script>$('#male').attr('checked', true);
										$('#female').attr('checked', false);</script>";
									}elseif(strcmp($data['gender'], 'Nữ') == 0){
										echo "<script>$('#male').attr('checked', false);
										$('#female').attr('checked', true);</script>";
									}
									echo "<script>$('#describes').val('".$data['describes']."')</script>"; 
									echo '<script type="text/javascript">
												$(document).ready(function() {
													$("#types option[value=\''.$data['types'].'\']").attr("selected", "selected");
												});
											</script>';
	?>
	<?php 
endif; 
?>
<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Quản trị Products';
	});
</script>