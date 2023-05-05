<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from lienhe where lienhe_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from lienhe order by lienhe_id desc";
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
				   <h4 class="box-title">Liên hệ </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Họ Tên</th>
							   <th>Email</th>
							   <th>Số Điện Thoại</th>
							   <th>Nội Dung</th>
							   <th>Ngày</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['lienhe_id']?></td>
							   <td><?php echo $row['Ten']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['SoDT']?></td>
							   <td><?php echo $row['NoiDung']?></td>
							   <td><?php echo $row['NgayThem']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['lienhe_id']."' onclick = 'return confirmDelete();'>Xóa</a></span>";
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