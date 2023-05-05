<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Chi tiết đơn hàng </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
								<thead>
									<tr>
										<th class="product-thumbnail">Tên sản phẩm</th>
										<th class="product-thumbnail">Ảnh</th>
										<th class="product-name">Số Lượng</th>
										<th class="product-price">Giá</th>
										<th class="product-price">Thành tiền</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$res=mysqli_query($con,"select distinct(chitiethoadon.chitiethoadon_id) ,chitiethoadon.*,sanpham.TenSanPham,sanpham.image,`hoadon`.diachi,`hoadon`.TinhThanh,`hoadon`.Zip from chitiethoadon,sanpham ,`hoadon` where chitiethoadon.hoadon_id='$order_id' and  chitiethoadon.sanpham_id=sanpham.sanpham_id GROUP by chitiethoadon.chitiethoadon_id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `hoadon` where hoadon_id='$order_id'"));
									
									$address=$userInfo['DiaChi'];
									$city=$userInfo['TinhThanh'];
									$pincode=$userInfo['Zip'];
									
									while($row=mysqli_fetch_assoc($res)){
									
									$total_price=$total_price+($row['SoLuong']*$row['Gia']);
									?>
									<tr>
										<td class="product-name"><?php echo $row['TenSanPham']?></td>
										<td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
										<td class="product-name"><?php echo $row['SoLuong']?></td>
										<td class="product-name"><?php echo $row['Gia']?></td>
										<td class="product-name"><?php echo $row['SoLuong']*$row['Gia']?></td>
										
									</tr>
									<?php } ?>
									<tr>
										<td colspan="3"></td>
										<td class="product-name">Tổng Tiền</td>
										<td class="product-name"><?php echo $total_price?></td>
										
									</tr>
								</tbody>
							
						</table>
						<div id="address_details">
							<strong>Địa chỉ</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong>Tình Trạng</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select tinhtrangdathang.TrangThai from tinhtrangdathang,`hoadon` where `hoadon`.hoadon_id='$order_id' and `hoadon`.tinhtrang_id=tinhtrangdathang.tinhtrang_id"));
							echo $order_status_arr['TrangThai'];
							?>
							
							<div>
								<form method="post">
									<select class="form-control" name="update_order_status" required>
										<option value="">Chọn trạng thái</option>
										<?php
										$res=mysqli_query($con,"select * from tinhtrangdathang");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['tinhtrang_id'].">".$row['TrangThai']."</option>";
											}else{
												echo "<option value=".$row['tinhtrang_id'].">".$row['TrangThai']."</option>";
											}
										}
										?>
									</select>
									<input type="submit" class="form-control" value="Xác nhận" />
								</form>
							</div>
						</div>
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