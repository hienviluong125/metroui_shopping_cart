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
            <ul class="float-right no-hover header-menu h-menu top-header-bg ">
                <li>
                    <a href="#">
                        <span class="mif-near-me"></span>
                        Đăng nhập
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="mif-user"></span>
                        Đăng ký
                    </a>
                </li>
            </ul>
        </header>
    </div>
    <div class="pos-fixed fixed-top middle-header app-bar-wrapper z-top">
        <div class="container pos-relative" style="background:white !important;height:56px !important;">
            <div class="grid" style="background:white !important;height:56px !important;">
                <div class="row">
                    <div class="cell-3 logo pb-2">
                        <img src="public/img/logo.png" height="35px">
                    </div>
                    <div class="cell-6">
                        <div class="search-bar bg-white">
                            <div class="search-by bg-white" data-cate="Tất cả">
                                <span class="cate"></span>
                                <span class="mif-chevron-thin-down float-right pr-2 search-cate-dd-icon"></span>
                                <div class="search-by-list z-top">
                                    <p class="p-0 m-0">Tất cả</p>
                                    <p class="p-0 m-0">Loại sản phẩm</p>
                                    <p class="p-0 m-0">Nhà phát hành</p>
                                    <p class="p-0 m-0">Giá tiền</p>
                                    <p class="p-0 m-0">Lượt xem</p>
                                </div>
                            </div>
                            <div class="search-input bg-white">
                                <input placeholder="Nhập nội dung tìm kiếm..." type="text" id="search-input" />
                            </div>
                            <div class="search-icon ">
                                <span class="mif-search"></span>
                            </div>
                        </div>
                    </div>
                    <div class="cell-3">
                        <div class="shopping-cart-wrapper float-left">
                            <div class="shopping-cart  pt-1 pl-2 pr-2 mr-3 float-right ">
                                <span class="icon mif-cart fg-white"></span>
                                <span class="badge bg-green fg-white">4</span>
                            </div>
                        </div>
                        <div class="user-info float-right">
                            <img height="30px" src="<?php echo ROOTURL?>/public/img/noavatar.jpg"/>
                            <span class="vc">you name</span>
                            <span style="padding-top:1.5px !important;" class="user-dd-icon ml-1 mif-chevron-thin-down float-right"></span>
                            <div class="user-info-dropdown z-top">
                                <p class="p-2 text-center m--0 ">
                                    Thông tin
                                </p>
                                <p class="p-2 text-center m-0 ">
                                    Giỏ hàng</p>
                                <p class="p-2 text-center m-0  logout">
                                    Đăng xuất
                                </p>
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
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li>
                    <a href="#" class="dropdown-toggle no-marker">Loại sản phẩm</a>
                    <div class="mega-container p-2 m-1 bg-white" data-role="dropdown">
                        <div class="row">
                            <?php foreach($data['allCategories'] as $item){?>
                                <div class="cell-2 mt-5">
                                    <a href="xxx">
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
                <li><a href="#">Khuyến mãi</a></li>
                <li>
                    <a href="#" class="dropdown-toggle no-marker">Nhà sản xuất</a>
                    <div class="mega-container p-2 m-1 bg-white" data-role="dropdown">
                        <div class="row">
                            <?php foreach($data['allBrands'] as $item){?>
                                    <div class="cell-2 mt-5">
                                        <a href="xxx">
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
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </header>
    </div>