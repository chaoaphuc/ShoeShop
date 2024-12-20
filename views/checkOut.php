
<hr>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Size</th>
				<th scope="col">Số Lượng</th>
				<th scope="col">Giá</th>
				<th scope="col">Địa chỉ nhận</th>
				<th scope="col">Số điện thoại</th>
				<th scope="col">Trạng thái</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
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
							<?=$row["size"]?>
						</td>
						<td>
							<?=$row['amount']?>
						</td>
						<td>
							<?=number_format($row["amount"]*$row["cost"])?>đ
						</td>
						<td>
							<?=$row['address']?>
						</td>
						<td>
							<?=$row['phone']?>
						</td>
						<td>
							<?php 
								if($row['status'] == 1){
									echo "<p style='color:#004085;'>Đang xác nhận</p>";
								}
								if($row['status'] == 2){
									echo "<p style='color:#856404;'>Đang giao hàng</p>";
								}
								if($row['status'] == 3){
									echo "<p style='color:#155724;'>Đã giao hàng</p>";
								}
								if($row['status'] == 0){
									echo "<p style='color:#721c24;'>Đã hủy</p>";
								}
							?>
						</td>
						<td>
							<?php if($row['status'] == 1):?>
								<form action="" method="POST">
									<input type="number" name="idorder" value="<?=$row["idorder"]?>" hidden>
									<input type="number" name="idproduct" value="<?=$row["idproduct"]?>" hidden>
									<input type="number" name="amount" value="<?=$row["amount"]?>" hidden>
									<input type="submit" name="cancel" value="Hủy">
								</form>
							<?php endif; ?>
						</td>
					</tr>
				<?php } endif; ?>
			</tbody>
		</table>
	</div>
	<hr>