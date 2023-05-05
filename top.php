<?php
require('ketnoi.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from danhmuc where TrangThai=1 order by TenDanhMuc asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;    
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();



$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="My Ecom Website";
$meta_desc="My Ecom Website";
$meta_keyword="My Ecom Website";
if($mypage=='sanpham.php'){
    $product_id=get_safe_value($con,$_GET['id']);
    $product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from sanpham where sanpham_id='$product_id'"));
    $meta_title=$product_meta['meta_title'];
    $meta_desc=$product_meta['meta_desc'];
    $meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='lienhe.php'){
    $meta_title='Contact Us';
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
    <meta name="keywords" content="<?php echo $meta_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
    .htc__shopping__cart a span.htc__wishlist {
        background: #c43b68;
        border-radius: 100%;
        color: #fff;
        font-size: 9px;
        height: 17px;
        line-height: 19px;
        position: absolute;
        right: 18px;
        text-align: center;
        top: -4px;
        width: 17px;
    }
    </style>
</head>
<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Trang chủ</a></li>
                                        <?php
                                        foreach($cat_arr as $list){
                                            ?>
                                            <li><a href="danhmuc.php?id=<?php echo $list['danhmuc_id']?>"><?php echo $list['TenDanhMuc']?></a></li>
                                            <?php
                                        }
                                        ?>
                                        <li><a href="lienhe.php">Liên Hệ</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Trang chủ</a></li>
                                            <?php
                                            foreach($cat_arr as $list){
                                                ?>
                                                <li><a href="danhmuc.php?id=<?php echo $list['danhmuc_id']?>"><?php echo $list['TenDanhMuc']?></a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="lienhe.php">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <?php if(isset($_SESSION['USER_LOGIN'])){
                                            echo '<a href="logout.php">Đăng xuất</a> <a href="donhang.php">Đơn hàng</a>';
                                        }else{
                                            echo '<a href="login.php">Đăng nhập</a>';
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>
        <div class="body__overlay"></div>
        <div class="offset__wrapper">
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="timkiem.php" method="get">
                                    <input placeholder="Nhập từ khóa cần tìm... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>