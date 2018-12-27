<?php  $user = getSession('user'); 
       $cart = getSession('cart');
       $cartQty = 0;
       if(isset($cart)){
           $cartQty = count($cart);
       }
?>
<div class="pos-fixed fixed-top header-menu-wrapper app-bar-wrapper z-top top-header-bg" data-role="appbar"
        data-expand-point="md">
        <header class="container pos-relative top-header-bg">
            <ul class="float-left no-hover header-menu h-menu top-header-bg ">
                <li>
                    <a href="#">
                        <span class="mif-mail"></span>
                        WeeDev@blur.it.vn
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="mif-phone"></span>
                        + (0123) 45678
                    </a>
                </li>
            </ul>
            <?php
                if(!isset($user)){
            ?>
            <ul class="float-right no-hover header-menu h-menu top-header-bg ">
                <li>
                    <a href="<?php echo(ROOTURL . '/user/login');?>">
                        <span class="mif-near-me"></span>
                        Đăng nhập
                    </a>
                </li>
                <li>
                    <a href="<?php echo(ROOTURL . '/user/register');?>">
                        <span class="mif-user"></span>
                        Đăng ký
                    </a>
                </li>
            </ul>        
            <?php } ?>
            
        </header>
    </div>
    <div class="pos-fixed fixed-top middle-header app-bar-wrapper z-top">
        <div class="container pos-relative" style="background:white !important;height:56px !important;">
            <div class="grid" style="background:white !important;height:56px !important;">
                <div class="row">
                    <div class="cell-3 logo pb-2">
                        <img src="<?php echo ROOTURL ?>/public/img/logo.png" height="35px">
                    </div>
                    <div class="cell-6">
                        <div class="search-bar bg-white">
                            <div class="search-by bg-white" data-cate="Tên sản phẩm">
                                <span class="cate"></span>
                                <span class="mif-chevron-thin-down float-right pr-2 search-cate-dd-icon"></span>
                                <div class="search-by-list z-top">
                                    <p data-value="name" class="p-0 m-0">Tên sản phẩm</p>
                                    <p data-value="categories" class="p-0 m-0">Loại sản phẩm</p>
                                    <p data-value="brands" class="p-0 m-0">Nhà phát hành</p>
                                    <p data-value="description" class="p-0 m-0">Mô tả</p>
                       
                                </div>
                            </div>
                            <div class="search-input bg-white">
                                <input placeholder="Nhập nội dung, ấn phím enter để tìm kiếm..." type="text" id="search-input" />
                            </div>
                            <div class="search-icon ">
                                <span class="mif-search"></span>
                            </div>
                        </div>
                    </div>
                    <div class="cell-3">
                        <?php
                            if(isset($user) && !empty($user)){
                        ?>
                            <div class="user-info float-left">
                                <img class="float-left mr-2" height="35px" width="35px" src="<?php echo ROOTURL . '/public/img/' . $user['avatar'];?>" />
                                <span class="float-left pt-1 text-center mr-2"><?php echo $user['username'];?></span>

                                <span style="padding-top:1.5px !important;" class="user-dd-icon ml-1 mt-1 mif-chevron-thin-down float-left"></span>
                                <div class="user-info-dropdown z-top">
                                    <p class="p-2 text-center m--0 ">
                                         <a style="text-decoration:none;" class="fg-dark" href="<?php echo (ROOTURL . '/user/profile'); ?>">Thông tin</a>
                                    </p>
                                    <p class="p-2 text-center m-0 ">
                                        <a style="text-decoration:none;" class="fg-dark" href="<?php echo (ROOTURL . '/cart'); ?>">Giỏ hàng</a>
                                    </p>
                                    <p class="p-2 text-center m-0 ">
                                        <a style="text-decoration:none;" class="fg-dark" href="<?php echo (ROOTURL . '/user/orders'); ?>">Lịch sử mua hàng</a>
                                    </p>
                                    <?php if($user['role'] =='admin'){?>
                                    <p class="p-2 text-center m-0 ">
                                        <a style="text-decoration:none;" class="fg-dark" href="<?php echo (ROOTURL . '/dashboard/product/show/1'); ?>">Dashboard</a>
                                    </p>
                                    <?php }?>
                                    <p class="p-2 text-center m-0  logout">
                                        <a style="text-decoration:none;" class="fg-dark" href="<?php echo (ROOTURL . '/user/logout'); ?>">Đăng xuất</a>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        <div class="shopping-cart-wrapper float-left">
                             <a href="<?php echo (ROOTURL . '/cart'); ?>">
                                <div class="shopping-cart  pt-1 pl-2 float-right ">
                                    <span class="icon mif-cart fg-white"></span>
                                    <span class="badge shopping-badge bg-orange fg-white"><?php echo ($cartQty);?></span>
                                </div>
                            </a>
                            
                            <div class="bg-light p-2 cart-notify-area border border-radius-4" data-show="false">
                            <div class="float-left text-center bg-green check-icon mr-2"> 
                                <span class="text-center fg-white mif-checkmark"></span>
                            </div>
                            <span class="float-right mif-cancel"></span>
                            <p class="m-0 p-0 float-left">Đã thêm vào giỏ hàng</p>
                            
                            <a href="<?php echo (ROOTURL . '/cart'); ?>" class="button cell-12 mt-2 mb-2 bg-orange border-btn fg-white">Xem chi tiết giỏ hàng</a>  
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos-fixed fixed-top main-menu-wrapper bg-custom-blue app-bar-wrapper" data-role="appbar"
        data-expand-point="md">
        <header class="container pos-relative bg-custom-blue">
            <ul class="h-menu mega main-menu  bg-custom-blue fg-white">
                <li><a href="<?php echo(ROOTURL . '/home')?>">Trang chủ</a></li>
                <li><a href="<?php echo ROOTURL . '/about' ?>">Giới thiệu</a></li>
                <li>
                    <a href="#" class="dropdown-toggle no-marker">Loại sản phẩm</a>
                    <div class="mega-container p-2 m-1 bg-white" data-role="dropdown">
                        <div class="row">
                            <?php foreach($data['allCategories'] as $item){?>
                                <div class="cell-2 mt-5">
                                    <a href="<?php echo(ROOTURL . '/product/show/category/' . $item->link_name . '/1');?>">
                                        <div class="text-center" style="display:block">
                                            <img src="<?php echo ROOTURL?>/public/img/<?php echo $item->image ?>" height="100px" />
                                        </div>
                                        <h5 class="fg-dark text-center"><?php echo $item->name ?></h5>
                                    </a>
                                </div>
                            <?php }?> 
                         
                           
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle no-marker">Nhà sản xuất</a>
                    <div class="mega-container p-2 m-1 bg-white" data-role="dropdown">
                        <div class="row">
                            <?php foreach($data['allBrands'] as $item){?>
                                    <div class="cell-2 mt-5">
                                        <a href="<?php echo(ROOTURL . '/product/show/brand/' . $item->link_name . '/1');?>">
                                            <div class="text-center" style="display:block">
                                                <img src="<?php echo ROOTURL?>/public/img/<?php echo $item->image ?>" height="100px" />
                                            </div>
                                            <h5 class="fg-dark text-center"><?php echo $item->name ?></h5>
                                        </a>
                                    </div>
                                <?php }?> 
                        </div>
                    </div>
                </li>
                <li><a href="<?php echo ROOTURL . '/contact' ?>">Liên hệ</a></li>
            </ul>
        </header>
    </div>