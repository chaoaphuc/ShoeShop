	
	<div class="col-md-6 offset-md-3">
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Thống kê</th>
				<th scope="col">Số liệu</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="col">Số sản phẩm đang kinh doanh:</th>
				<td><?=$countProducts?></td>
			</tr>
			<tr>
				<th scope="col">Số đơn đã hủy:</th>
				<td><?=$countCancelOrders?></td>
			</tr>
			<tr>
				<th scope="col">Số đơn đã giao:</th>
				<td><?=$countDeliveredOrders?></td>
			</tr>
			<tr>
				<th scope="col">Số đơn đang giao:</th>
				<td><?=$countShipOrders?></td>
			</tr>
			<tr>
				<th scope="col">Số đơn đang chờ xác nhận:</th>
				<td><?=$countOrders?></td>
			</tr>
			<tr>
				<th scope="col">Số lượng Users:</th>
				<td><?=$countUsers?></td>
			</tr>
			<tr>
				<th scope="col">Số lượng Users Admin:</th>
				<td><?=$countAdminUsers?></td>
			</tr>
			<tr>
				<th scope="col">Số lượng Users Customer:</th>
				<td><?=$countCustomerUsers?></td>
			</tr>
		</tbody>
	</table>
	</div>

