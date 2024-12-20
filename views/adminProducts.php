	<div class="row offset-2">
		<a href="../controller/c_adminAddProduct.php"">
			<button type="button" class="btn btn-outline-success ">Thêm sản phẩm</button>
		</a>
	</div>
	<hr>
	<div aria-label="breadcrumb"  class="breadcrumb">
		<div class="col-md-4">
			<h4 >Danh sách sản phẩm: <?=$total_record?></h4>
		</div>
		<div class="col-md-6 offset-2" id="filter">
			<form action="" class="form-inline" method="GET">
				<select name="gender" id="gender" class="form-control">
					<option value="-1">Giới tính</option>
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
				</select>
				<select name="types" id="types" class="form-control">
					<option value="-1">Loại giày</option>
					<option value="Giày Sneaker">Giày Sneaker</option>
					<option value="Giày Boot">Giày Boot</option>
					<option value="Giày Lười">Giày Lười</option>
					<option value="Giày Cao Gót">Giày Cao Gót</option>
					<option value="Giày Tây">Giày Tây</option>
				</select>
				<select name="cost" id="cost" class="form-control">
					<option value="-1">Giá</option>
					<option value="1">Thấp - Cao</option>
					<option value="2">Cao - Thấp</option>
				</select>
				<button class="btn btn-outline-success" type="submit">Lọc</button>
			</form>
		</div>
	</div>	
	<table class="table table-striped">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Tên</th>
				<th scope="col">Giới tính</th>
				<th scope="col">Kiểu giày</th>
				<th scope="col">Giá</th>
				<th scope="col">Số lượng </th>
				<th scope="col">Hình ảnh</th>
				<th scope="col">Mô tả</th>
				<th scope="col">Ngày nhập</th>
				<th scope="col">Sửa cuối</th>
				<th scope="col">Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td><a href="../controller/c_detail.php?id=<?=$row['id']?>"><?=$row["name"]?></a></td>
						<td><?=$row["gender"]?></td>
						<td><?=$row["types"]?></td>
						<td><?=$row["cost"]?>đ</td>
						<td><?=$row["amount"]?></td>
						<td><?=$row["img"]?></td>
						<td><?=$row["describes"]?></td>
						<td><?=$row["crtime"]?></td>
						<td><?=$row["updateTime"]?></td>
						<td><a href="?edit=<?=$row['id']?>"><button type="button" class="btn btn-info">Edit</button> </a></td>
					</tr>
					<?php 
				}
			endif; ?>
		</tbody>
	</table>
	<script src="../js/ajax.js" type="text/javascript"></script>
