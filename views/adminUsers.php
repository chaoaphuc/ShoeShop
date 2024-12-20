	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Tên:</th>
				<th scope="col">Tên tài khoản</th>
				<th scope="col">Email</th>
				<th scope="col">Giới tính</th>
				<th scope="col">Ngày sinh</th>
				<th scope="col">Số điện thoại</th>
				<th scope="col">Địa chỉ</th>
				<th scope="col">Xác nhận</th>
				<th scope="col">Quyền</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td>
							<?=$row["id"]?>
						</td>
						<td>
							<?=$row["name"]?>
						</td>						
						<td>
							<?=$row["username"]?>
						</td>
						<td>
							<?=$row['email']?>
						</td>
						<td>
							<?=$row["sex"]?>
						</td>
						<td>
							<?php if($row['birthday']!=="0000-00-00") 
							echo $row['birthday'];
							?>
						</td>
						<td>
							<?=$row['phone']?>
						</td>
						<td>
							<?=$row['address']?>
						</td>
						<td>
							<?php 
								
								if($row['verified'] == 1){
									echo "<p style='color:#155724;'>Đã xác nhận</p>";
								}
								if($row['verified'] == 0){
									echo "<p style='color:#721c24;'>Chưa xác nhận</p>";
								}
							?>
						</td>
						<td>
							<?php 
								
								if($row['role'] == 2){
									echo "<p style='color:#155724;'>Khách hàng</p>";
								}
								if($row['role'] == 1){
									echo "<p style='color:#721c24;'>Admin</p>";
								}
							?>
						</td>
						<td>
							<a href="?edit=<?=$row['id']?>"><input type="button" class="btn btn-info" value="Edit"></a>
						</td>
					</tr>
				<?php } endif; ?>
			</tbody>
		</table>



