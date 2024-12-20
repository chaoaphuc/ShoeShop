	<div class="content">
		<div class="col-md-8 offset-2">
			<div class="card">
				<div class="card-header">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thông tin sản phẩm</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Mô tả</a>
						</div>
					</nav>	
				</div>
				<div class="tab-content" id="nav-tabContent">
					<?php if (isset($data)): ?>
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="detail-product">
								<div class="col-md-7 float-left">
									<div class="img-detail" >
										<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>">
									</div>
								</div>
								<div class="col-md-5 float-right">
									<h2 class="card-title"><?=$data['name']?></h2>
									<p><?=$data['types']?> - <?=$data['gender']?></p>
									<form action="?id=<?=$data['id']?>" method="POST">
										<label for="size">Size: </label>
										<select name="size" id="size">
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
										</select>
										<label for="amount">Số lượng: </label>
										<input type="number" name="amount" id="amount" min="1"  value="1" style="width: 45px;">
										<br>
										<div class="alert alert-danger" id="had" style="display:none;">
											Sản phẩm đã có trong giỏ hàng!</div>
										<div class="alert alert-danger" id="danger" style="display:none;">
											Bạn cần đăng nhập để mua hàng!</div>
											<div class="alert alert-danger" id="amountTotal" style="display:none;">
											Hiện tại chỉ có thể đặt tối đa <?php if(isset($amount_total['amount'])) echo $amount_total['amount']; ?> sản phẩm!</div>
											<div class="alert alert-success" id="added" style="display:none;">
												Thêm vào giỏ hàng thành công!
											</div>
										<input type="submit"	name="add" id="addcart" class="btn btn-success"  value="Thêm vào giỏ hàng">
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><p><?=$data['describes']?></p></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>