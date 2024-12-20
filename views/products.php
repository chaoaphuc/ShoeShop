	
	<hr>
	<div aria-label="breadcrumb"  class="breadcrumb">
		<div class="col-md-4">
			<h4 >Danh sách sản phẩm: <?php if (isset($total_record)) {
				echo $total_record;
			} ?></h4>
		</div>
		<div class="col-md-6 offset-2" id="filter">
			<form action="" class="form-inline" method="GET">
				<input type="text" name='search' value="<?php if(isset($_GET['search'])) echo  $_GET['search']; ?>" hidden>
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
	
	<div class="content">
		<?php
			if (isset($data) && $data!=0) {
				foreach ($data as $row) {
					?>
						<div class="col-md-3 float-left">
							<a class="a-product" href="../controller/c_detail.php?id=<?=$row['id']?>">
								<div class="product">
										<img src="../images/<?=$row['img']?>" alt="">
										<div class="info-product">
											<p class="cost-product"><?=$row['cost']?>đ</p>
											<p class="name-product"><?=$row['name']?></p>
										</div>
								</div>
							</a>
						</div>
					<?php
				}
			}
		?>
		<div class="clearfix"></div>
	</div>
	<script src="../js/ajax.js" type="text/javascript"></script>
	