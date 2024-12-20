	<?php
	if (isset($data) && $data!=false):
		foreach ($data as $row) {
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-3">
						<div class="card">
							<div class="card-header">
								<h2 align="center">Thông tin đơn mua</h2>
							</div>
							<div class="card-body">
								<form action="" method="POST" >
									<div class="form-group">
										<label for="iduser">Khách hàng: </label>
										<a id="iduser" href="../controller/c_adminUsers.php?id=<?=$row["iduser"]?>"><?=$row["nameuser"]?></a>
									</div>
									<div class="form-group">
										<label for="idproduct">Sản phẩm: </label>
										<a id="idproduct" href="../controller/c_detail.php?id=<?=$row["idproduct"]?>"><?=$row["name"]?></a>
									</div>
									<div class="form-group">
										<label for="idproduct">Size: </label>
										<select class="form-control" name="size" id="size">
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
										</select>
									</div>
									<?="<script>$('#size option[value=".$row['size']."]').attr('selected', 'selected');</script>"?>
									<div class="form-group">
										<label for="idproduct">Số lượng: </label>
										<input class="form-control" type="number" name="amount" id="amount" min="1"  style="width: 85px;" value="<?=$row['amount']?>">
									</div>
									<div class="form-group">
										<label for="phone">Số điện thoại: </label>
										<input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" maxlength="15" value="<?=$row["phone"]?>">
									</div>
									<div class="form-group">
										<label for="address">Địa chỉ: </label>
										<input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ" value="<?=$row["address"]?>">
									</div>
									<div class="form-group">
										<label for="status">Trạng thái: </label>
										<select name="status" id="status" class="form-control">
											<option value="0">Đã hủy</option>
											<option value="3">Đã giao</option>
											<option value="2">Đang giao</option>
											<option value="1">Đang xác nhận</option>
										</select>
										<?="<script>$('#status option[value=".$row['status']."]').attr('selected', 'selected');</script>"?>
									</div>
									<div class="form-group">
										<label for="updateTime">Thời gian cập nhật cuối: 
										<?php
											$date = date_create($row['updateTime']);
											$date = date_format($date, ' H:i:s \, d-m-Y');
											echo $date;
										?>
										</label>
									</div>
									<div class="form-group">
											<input name="update" type="submit" class="btn btn-success" value="Cập nhật">
											<input name="delete" type="submit" class="btn btn-danger" value="Xóa đơn">
										
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } endif; ?>