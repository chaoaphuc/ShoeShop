
<div class="alert alert-danger col-md-6 offset-md-3" id="amountTotal" style="display:none;">
											Hiện tại chỉ có thể đặt số lượng tối đa <?php if(isset($amout_ok)) echo $amout_ok; ?> cho sản phẩm này!</div>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Size</th>
				<th scope="col">Số Lượng</th>
				<th scope="col">Giá</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$total_cost =0;
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					$total_cost += ($row["amount"]*$row["cost"]);
					?>
					<tr id="<?=$row["idcart"]?>">
						<td>
							<div class="img-cart">
								<img src="../images/<?=$row["img"]?>"	alt="<?=$row["name"]?>" style="min-height: 150px ; max-height: 150px; min-width: 220px; max-width: 220px; border: 0; display: inline-block;">
							</div>
						</td>
						<td>
							<a href="../controller/c_detail.php?id=<?=$row["idproduct"]?>"><?=$row["name"]?></a>
						</td>						
						<td>
							<form action="" method="POST">	
								<select name="size" id="size<?=$row["idcart"]?>">
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
								</select>
								<?="<script>$('#size".$row['idcart']." option[value=".$row['size']."]').attr('selected', 'selected');</script>"?>
							</td>
							<td>
								<input type="number" name="amount" id="amount" min="1" style="width: 45px;" value="<?=$row['amount']?>">
							</td>
							<td>
								<?=number_format($row["amount"]*$row["cost"])?> đ
							</td>
							<td>
								<input type="number" name="idcart" value="<?=$row["idcart"]?>" hidden>
								<input type="submit" class="btn btn-info" name="update" value="Cập nhật">
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input type="number" name="idcart" value="<?=$row["idcart"]?>" hidden>
								<input type="submit" class="btn btn-danger" name="delete" value="Xóa">
							</form>
						</td>
					</tr>
				<?php } endif; ?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td >Tổng số tiền:</td>
					<td><?=number_format($total_cost)?> đ</td>
					<td>
						<?php if (number_format($total_cost) != 0): ?>
						<a href="#collapseExample">
							<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								Thanh toán
							</button>
						</a>
					<?php endif; ?>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<?php if (number_format($total_cost) != 0): ?>
			<div class="collapse" id="collapseExample">
				<div class="card card-body col-md-6 offset-md-3">
					<form action="" class="form" method="POST">
						<div class="form-group">
							<label for="address">Địa chỉ nhận hàng + Thanh toán:</label>
							<br>
							<input type="text" name="address" id="address" class="form-control" rows="3" placeholder="Nhập địa chỉ" value="<?=$userInfo['address']?>" required>
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<br>
							<input type="text" name="phone" id="phone" class="form-control" rows="3" placeholder="Nhập số điện thoại" value="<?=$userInfo['phone']?>" required>
						</div>
						<button class="btn btn-success" name="submitOrder" type="submit">Đặt hàng</button>
					</form>
				</div>
			</div>
		<?php endif; ?>
	</div>