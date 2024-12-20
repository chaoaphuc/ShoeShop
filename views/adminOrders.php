<!-- 
	** Bài tập nhóm PHP
	** Nguyễn Thanh Phúc 
	** github.com/ntphuc98 
-->
<?php require_once("navAdmin.php"); ?>
	<div aria-label="breadcrumb"  class="breadcrumb">
		<div class="col-md-4">
			<h4 >Danh sách đơn hàng: </h4>
		</div>
		<div class="col-md-6 offset-2" id="filter">
			<form action="" class="form-inline" method="GET">
				<input class="form-control mr-sm-2" name="searchOd" id="searchOd"	type="search" placeholder="Nhập tên khách hàng/sản phẩm" aria-label="Search">
				<select name="status" id="status" class="form-control">
					<option value="-1">Trạng thái</option>
					<option value="1">Đang xác nhận</option>
					<option value="2">Đang giao hàng</option>
					<option value="3">Đã giao hàng</option>
					<option value="0">Đã hủy</option>
				</select>
				<button class="btn btn-outline-success my-2 my-sm-0 " type="submit" >Tìm</button>
			</form>
		</div>
	</div>	
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Khách hàng</th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Size</th>
				<th scope="col">Số lượng</th>
				<th scope="col">Số tiền</th>
				<th scope="col">Địa chỉ</th>
				<th scope="col">Số điện thoại</th>
				<th scope="col">Thời gian đặt mua</th>
				<th scope="col">Trạng thái</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr >
						<td>
							<a href="../controller/c_adminUsers.php?edit=<?=$row["iduser"]?>">
								<?=$row["nameuser"]?>
							</a>
						</td>
						<td>
							<a href="../controller/c_detail.php?id=<?=$row["idproduct"]?>">
								<?=$row["name"]?>
							</a>
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
							$date = date_create($row['crtime']);
							$date = date_format($date, ' H:i:s \, d-m-Y');
							echo $date;
							?>
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
							<a href="?edit=<?=$row['idorder']?>"><input type="button" class="btn btn-info" value="Edit"></a>
						</td>
					</tr>
				<?php } endif; ?>
			</tbody>
		</table>