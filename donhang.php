<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Đơn hàng</span>
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
                                                <th class="product-thumbnail">ID Đơn hàng</th>
                                                <th class="product-name"><span class="nobr">Ngày đặt hàng</span></th>
                                                <th class="product-price"><span class="nobr"> Địa chỉ </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Hình thức thanh toán </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Tình Trạng thanh toán </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Tình trạng đặt hàng </span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select `hoadon`.*,tinhtrangdathang.TrangThai as order_status_str from `hoadon`,tinhtrangdathang where `hoadon`.users_id='$uid' and tinhtrangdathang.tinhtrang_id=`hoadon`.tinhtrang_id");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="chitietdonhang.php?id=<?php echo $row['hoadon_id']?>"> <?php echo $row['hoadon_id']?></a></td>
                                                <td class="product-name"><?php echo $row['NgayThem']?></td>
                                                <td class="product-name">
                                                <?php echo $row['DiaChi']?><br/>
                                                <?php echo $row['TinhThanh']?><br/>
                                                <?php echo $row['Zip']?>
                                                </td>
                                                <td class="product-name"><?php echo $row['HinhThucThanhToan']?></td>
                                                <td class="product-name"><?php echo ucfirst($row['TinhTrangThanhToan'])?></td>
                                                <td class="product-name"><?php echo $row['order_status_str']?></td>
                                                
                                            </tr>
                                            <?php } ?>
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