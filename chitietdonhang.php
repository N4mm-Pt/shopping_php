<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Chi tiết đơn hàng</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Tên sản phẩm</th>
												<th class="product-thumbnail">Ảnh</th>
                                                <th class="product-name">Số lượng</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-price">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(chitiethoadon.chitiethoadon_id) ,chitiethoadon.*,sanpham.TenSanPham,sanpham.image from chitiethoadon,sanpham ,`hoadon` where chitiethoadon.hoadon_id='$order_id' and `hoadon`.users_id='$uid' and chitiethoadon.sanpham_id=sanpham.sanpham_id");
											$total_price=0;
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
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        						
<?php require('footer.php')?>        