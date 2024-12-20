<div class="clearfix"></div>
<div class="col-md-6 float-left">
	<div aria-label="breadcrumb"  class="breadcrumb">
		<div class="text-center">
			<h4>Sản phẩm mua nhiều nhất</h4>
		</div>
	</div>
	<div class="col-md-6 offset-3 text-center">
		<?php
		if (isset($dataHot) && $dataHot!=0) {
			foreach ($dataHot as $rowHot) {
			?>
			<div class="float-left">
				<a class="a-product" href="../controller/c_detail.php?id=<?=$rowHot['id']?>">
					<div class="product">
						<img src="../images/<?=$rowHot['img']?>" alt="">
						<div class="info-product">
							<p class="cost-product"><?=$rowHot['cost']?>đ</p>
							<p class="name-product"><?=$rowHot['name']?></p>
						</div>
					</div>
				</a>
			</div>
			<?php
		}
	}
		?>
	</div>
</div>
<div class="col-md-6 float-left">
	<div aria-label="breadcrumb"  class="breadcrumb">
		<div class="text-center">
			<h4>Sản phẩm mới</h4>
		</div>
	</div>
	<div class="col-md-6 offset-3 text-center">
		<?php
		if (isset($dataNew) && $dataNew!=0) {
			foreach ($dataNew as $rowNew) {
			?>
			<div class="float-left">
				<a class="a-product" href="../controller/c_detail.php?id=<?=$rowNew['id']?>">
					<div class="product">
						<img src="../images/<?=$rowNew['img']?>" alt="">
						<div class="info-product">
							<p class="cost-product"><?=$rowNew['cost']?>đ</p>
							<p class="name-product"><?=$rowNew['name']?></p>
						</div>
					</div>
				</a>
			</div>
			<?php
			}
		}
		?>
	</div>
</div>
<div class="clearfix"></div>