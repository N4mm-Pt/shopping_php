<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update sanpham set TrangThai='$status' where sanpham_id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from sanpham where sanpham_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select sanpham.*,danhmuc.TenDanhMuc from sanpham,danhmuc where sanpham.danhmuc_id=danhmuc.danhmuc_id order by sanpham.sanpham_id desc";
$res=mysqli_query($con,$sql);
?>
<script type="text/javascript">
	function confirmDelete(){
    var flag = confirm("Bạn có chắc muốn xóa ?");
       if(flag)
            return true;
        else
            return false;
}
</script>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Sản Phẩm </h4>
				   <h4 class="box-link"><a href="sanpham_add.php">Thêm sản phẩm</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Danh Mục</th>
							   <th>Tên Sản Phẩm</th>
							   <th>Ảnh</th>
							   <th>Giá gốc</th>
							   <th>Giá</th>
							   <th>Số Lượng</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['sanpham_id']?></td>
							   <td><?php echo $row['TenDanhMuc']?></td>
							   <td><?php echo $row['TenSanPham']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['GiaGoc']?></td>
							   <td><?php echo $row['Gia']?></td>
							   <td><?php echo $row['SoLuong']?></td>
							   <td>
								<?php
								if($row['TrangThai']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['sanpham_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['sanpham_id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='sanpham_add.php?id=".$row['sanpham_id']."'>Sửa</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['sanpham_id']."' onclick = 'return confirmDelete();'>Xóa</a></span>";
								
								?>
							   </td>
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