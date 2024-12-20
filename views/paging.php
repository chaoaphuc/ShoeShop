<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-end">
		<?php
		if (isset($current_page) && $current_page > 1 && $total_page > 1){
			?>

			<li class="page-item">
				<a class="page-link" href="?<?php if(isset($link)) echo $link; ?>page=<?=($current_page-1)?>">Previous</a>
			</li>

			<?php
		}else{
			?>
			<li class="page-item disabled"> <a class="page-link" href="">Previous</a> </li> 
			<?php
		}
		// Lặp khoảng giữa
		if (isset($total_page)) 
			for ( $i = 1; $i <= $total_page; $i++){
							    // Nếu là trang hiện tại thì hiển thị thẻ span
							    // ngược lại hiển thị thẻ a
				if ($i == $current_page){
					?>
					<li class="page-item active">
						<span class="page-link"><?=$i?><!-- <span class="sr-only">(current)</span> --></span>
					</li> 
					<?php
				}
				else{
					?>
					<li class="page-item">
						<a class="page-link" href="?<?php if(isset($link)) echo $link; ?>page=<?=$i?>"><?=$i?></a> 
					</li> 
					<?php
				}
			}
			if (isset($current_page) && $current_page < $total_page && $total_page > 1){
				?>
				<li class="page-item"> 
					<a class="page-link" href="?<?php if(isset($link)) echo $link; ?>page=<?=($current_page+1)?>">Next</a> 
				</li>
				<?php
			}else{
				?>
				<li class="page-item disabled">
					<a class="page-link" href="">Next</a>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>