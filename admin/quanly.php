<?php
require('top.inc.php');

$sql="select * from users order by users_id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Quản lý đơn hàng </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail">ID Đơn hàng</th>
									<th class="product-name"><span class="nobr">Ngày đặt hàng</span></th>
									<th class="product-price"><span class="nobr"> Địa chỉ </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Hình thức thanh toán </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Tình Trạng Thanh toán </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Tình Trạng </span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res=mysqli_query($con,"select `hoadon`.*,tinhtrangdathang.TrangThai as order_status_str from `hoadon`,tinhtrangdathang where tinhtrangdathang.tinhtrang_id=`hoadon`.tinhtrang_id");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-add-to-cart"><a href="quanlychitiet.php?id=<?php echo $row['hoadon_id']?>"> <?php echo $row['hoadon_id']?></a></td>
									<td class="product-name"><?php echo $row['NgayThem']?></td>
									<td class="product-name">
									<?php echo $row['DiaChi']?><br/>
									<?php echo $row['TinhThanh']?><br/>
									<?php echo $row['Zip']?>
									</td>
									<td class="product-name"><?php echo $row['HinhThucThanhToan']?></td>
									<td class="product-name"><?php echo $row['TinhTrangThanhToan']?></td>
									<td class="product-name"><?php echo $row['order_status_str']?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>