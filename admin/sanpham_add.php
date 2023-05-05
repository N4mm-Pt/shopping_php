<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';
$banchay = '';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sanpham where sanpham_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['danhmuc_id'];
		$name=$row['TenSanPham'];
		$mrp=$row['GiaGoc'];
		$price=$row['Gia'];
		$qty=$row['SoLuong'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$banchay = $row['BanChay'];
	}else{
		header('location:sanpham.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$banchay=get_safe_value($con,$_POST['banchay']);

	$res=mysqli_query($con,"select * from sanpham where TenSanPham='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['sanpham_id']){
			
			}else{
				$msg="Sản phẩm này đã tồn tại";
			}
		}else{
			$msg="Sản phẩm này đã tồn tại";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Ảnh chỉ hỗ trợ định dạng png,jpg và jpeg";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Ảnh chỉ hỗ trợ định dạng png,jpg và jpeg";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update sanpham set danhmuc_id='$categories_id',TenSanPham='$name',GiaGoc='$mrp',Gia='$price',SoLuong='$qty',short_desc='$short_desc',description='$description',BanChay='$banchay',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where sanpham_id='$id'";
			}else{
				$update_sql="update sanpham set danhmuc_id='$categories_id',TenSanPham='$name',GiaGoc='$mrp',Gia='$price',SoLuong='$qty',short_desc='$short_desc',description='$description',BanChay='$banchay',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where sanpham_id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into sanpham(danhmuc_id,TenSanPham,GiaGoc,Gia,SoLuong,short_desc,description,BanChay,meta_title,meta_desc,meta_keyword,TrangThai,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$banchay','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
		}
		header('location:sanpham.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sản phẩm</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Danh mục</label>
									<select class="form-control" name="categories_id">
										<option>Chọn danh mục</option>
										<?php
										$res=mysqli_query($con,"select danhmuc_id,TenDanhMuc from danhmuc order by TenDanhMuc asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['danhmuc_id']==$categories_id){
												echo "<option selected value=".$row['danhmuc_id'].">".$row['TenDanhMuc']."</option>";
											}else{
												echo "<option value=".$row['danhmuc_id'].">".$row['TenDanhMuc']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Tên Sản Phẩm</label>
									<input type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Giá Gốc</label>
									<input type="text" name="mrp" placeholder="Nhập giá gốc" class="form-control" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Giá</label>
									<input type="text" name="price" placeholder="Nhập giá" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Số Lượng</label>
									<input type="text" name="qty" placeholder="Nhập số lượng" class="form-control" required value="<?php echo $qty?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Ảnh</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Mô tả ngắn</label>
									<textarea name="short_desc" placeholder="Mô tả ngắn" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Mô tả</label>
									<textarea name="description" placeholder="Mô tả" class="form-control" required><?php echo $description?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Bán chạy</label>
									<select class="form-control" name="banchay" required>
										<option value=''>Chọn</option>
										<?php
										if($banchay==1){
											echo '<option value="1" selected>Có</option>
												<option value="0">Không</option>';
										}elseif($banchay==0){
											echo '<option value="1">Có</option>
												<option value="0" selected>Không</option>';
										}else{
											echo '<option value="1">Có</option>
												<option value="0">Không</option>';
										}
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Meta Title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Meta" class="form-control"><?php echo $meta_description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Từ Khóa" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Xác nhận</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>