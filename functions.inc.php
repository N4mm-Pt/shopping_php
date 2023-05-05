<?php 
	function get_safe_value($con,$str){
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($con,$str);
		}
	}
	function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order='',$banchay=''){
	$sql="select sanpham.*,danhmuc.TenDanhMuc from sanpham,danhmuc where sanpham.TrangThai=1 ";
	if($cat_id!=''){
		$sql.=" and sanpham.danhmuc_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and sanpham.sanpham_id=$product_id ";
	}
	if($banchay!=''){
		$sql.=" and sanpham.banchay=1 ";
	}
	$sql.=" and sanpham.danhmuc_id=danhmuc.danhmuc_id ";
	if($search_str!=''){
		$sql.=" and (sanpham.TenSanPham like '%$search_str%' or sanpham.description like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by sanpham.sanpham_id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
?>