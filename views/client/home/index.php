<div class="container ">
        <div class="ml-2 slider bg-blue">
            <div class="slider-wrapper">
                <div id="my-slider" class="single-slider">
                    <div class="sliders" data-animating="false">
                        <div class="image">
                            <img src="public/img/adsense0.jpg" height="300px" />
                        </div>
                        <div class="image">
                            <img src="public/img/adsense1.png" height="300px" />
                        </div>
                        <div class="image">
                            <img src="public/img/adsense2.png" height="300px" />
                        </div>
                    </div>
                </div>
                <span class="prev mif-chevron-left mif-5x fg-white"></span>
                <span class="next mif-chevron-right mif-5x fg-white"></span>
            </div>
        </div>
        <div class="slogan ml-5 mr-1">
            <div class="row">
                <div style="background:rgb(245, 245, 245);" class="pb-3 cell-4 text-center">
                    <span class="mif-truck  mif-5x"></span>
                    <p>
                    Giao hàng nhanh chóng, miễn phí<br>
                    mọi lúc mọi nơi
                    </p>
                </div>
                <div style="background:rgb(245, 245, 245);" class="pb-3 cell-4 text-center">
                    <span class="mif-laptop  mif-5x"></span>
                    <p>
                    Thiết bị hiện đại, chất lượng đầy đủ
                    <br>
                    nhu cầu thị trường
                    </p>
                </div>
                <div style="background:rgb(245, 245, 245);" class="pb-3 cell-4 text-center">
                    <span class="mif-users  mif-5x"></span>
                    <p>
                    Đội ngũ hỗ trợ nhiệt tình<br> chuyên nghiệp
                    </p>
                </div>
            </div>
        </div>
        
        <div class="products latest mt-10 pt-7">
            <div class="arrow arrow-orange" style="top:-9.5% !important;">
                <div class="inner-arrow bg-orange ">
                    Sản phẩm mới
                </div>
            </div>
            <div class="container the-same-container multiple-slider">
                <div class="multiple-slider-wrapper">
                    <div id="slider_1" class="my-multiple-slider" data-animating="false">
                        <div class="sliders">
                            <?php foreach($data['latestProducts'] as $item){?>
                                <div class="single-item float-left">
                                    <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                                    <div class="single-item-card">
                                        <p><?php  echo (substr($item->name,0,15) . '...')?></p>
                                        <p class="fg-red pb-2"><?php echo  number_format($item->price*1000) ?>₫</p>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
                    <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
                </div>
            </div>   
        </div>



        <div class="products hot-selling mt-10 pt-7">
            <div class="arrow arrow-bold-blue" style="top:-2.7% !important;">
                <div class="inner-arrow bg-bold-blue ">
                    Bàn phím
                </div>
            </div>
           
            <div class="row">
                <div class="cell-12">
                    <div class="row">
                        <?php foreach($data['keyBoards'] as $product){?>
                        <div class="cell-3">
                            <div class="row product m-2">
                                <div class="cell-12 ">
                                    <div class="product-img text-center">
                                        <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" style="height:137px !important;">
                                    </div>
                                </div>
                                <div class="cell-12 mb-2">
                                    <p class="m-0 p-0 text-left"><?php echo (substr($product->name,0,25) . '...')?></p>
                                    <p class="m-0 p-0 fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                                </div>
                                <div class="cell-12 mb-2">
                                    <a href="<?php echo ROOTURL . '/product/detail/' . $product->link_name?>" class="button border-btn dark float-left mr-2">
                                        <span class="mif-eye"></span>&ensp;Chi tiết
                                    </a>
                                    <button data-productid="<?php echo $product->id?>"  class="button add-to-cart border-btn success float-left ">
                                        <span class="mif-cart"></span>&ensp;Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <a href="<?php echo ROOTURL . '/product/show/category/ban-phim/1'?>" style="text-decoration:none;" class="text-large float-right mr-3"><h4 class="fg-red">Xem thêm</h4></a>
        </div>


        <div class="products latest mt-10 pt-7">
            <div class="arrow arrow-orange" style="top:-10.5% !important;">
                <div class="inner-arrow bg-orange ">
                    Sản phẩm hot
                </div>
            </div>
            <div class="container  the-same-container multiple-slider">
                <div class="multiple-slider-wrapper">
                    <div id="slider_2" class="my-multiple-slider" data-animating="false">
                        <div class="sliders">
                            <?php foreach($data['hotSellingProducts'] as $item){?>
                                <div class="single-item float-left">
                                    <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                                    <div class="single-item-card">
                                        <p><?php  echo (substr($item->name,0,15) . '...')?></p>
                                        <p class="fg-red pb-2"><?php echo  number_format($item->price*1000) ?>₫</p>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
                    <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
                </div>
            </div>   
        </div>

        <div class="products hot-selling mt-10 pt-7">
            <div class="arrow arrow-bold-blue" style="top:-2.7% !important;">
                <div class="inner-arrow bg-bold-blue ">
                    Tai nghe
                </div>
            </div>
           
            <div class="row">
                <div class="cell-12">
                    <div class="row">
                        <?php foreach($data['headPhones'] as $product){?>
                        <div class="cell-3">
                            <div class="row product m-2">
                                <div class="cell-12 ">
                                    <div class="product-img text-center">
                                        <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" style="height:137px !important;">
                                    </div>
                                </div>
                                <div class="cell-12 mb-2">
                                    <p class="m-0 p-0 text-left"><?php echo (substr($product->name,0,25) . '...')?></p>
                                    <p class="m-0 p-0 fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                                </div>
                                <div class="cell-12 mb-2">
                                    <a href="<?php echo ROOTURL . '/product/detail/' . $product->link_name?>" class="button border-btn dark float-left mr-2">
                                        <span class="mif-eye"></span>&ensp;Chi tiết
                                    </a>
                                    <button data-productid="<?php echo $product->id?>"  class="button add-to-cart border-btn success float-left ">
                                        <span class="mif-cart"></span>&ensp;Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <a href="<?php echo ROOTURL . '/product/show/category/tai-nghe/1'?>" style="text-decoration:none;" class="text-large float-right mr-3"><h4 class="fg-red">Xem thêm</h4></a>
        </div>



        <div class="products hot-selling mt-10 pt-7">
            <div class="arrow arrow-bold-blue" style="top:-2.7% !important;">
                <div class="inner-arrow bg-bold-blue ">
                    Chuột
                </div>
            </div>
           
            <div class="row">
                <div class="cell-12">
                    <div class="row">
                        <?php foreach($data['mouses'] as $product){?>
                        <div class="cell-3">
                            <div class="row product m-2">
                                <div class="cell-12 ">
                                    <div class="product-img text-center">
                                        <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" style="height:137px !important;">
                                    </div>
                                </div>
                                <div class="cell-12 mb-2">
                                    <p class="m-0 p-0 text-left"><?php echo (substr($product->name,0,25) . '...')?></p>
                                    <p class="m-0 p-0 fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                                </div>
                                <div class="cell-12 mb-2">
                                    <a href="<?php echo ROOTURL . '/product/detail/' . $product->link_name?>" class="button border-btn dark float-left mr-2">
                                        <span class="mif-eye"></span>&ensp;Chi tiết
                                    </a>
                                    <button data-productid="<?php echo $product->id?>"  class="button add-to-cart border-btn success float-left ">
                                        <span class="mif-cart"></span>&ensp;Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <a href="<?php echo ROOTURL . '/product/show/category/chuot/1'?>" style="text-decoration:none;" class="text-large float-right mr-3"><h4 class="fg-red">Xem thêm</h4></a>
        </div>

        



        <div class="products latest mt-10 pt-7">
            <div class="arrow arrow-orange" style="top:-9.5% !important;">
                <div class="inner-arrow bg-orange ">
                    Nhiều lượt xem
                </div>
            </div>
            <div class="container the-same-container multiple-slider">
                <div class="multiple-slider-wrapper">
                    <div id="slider_3" class="my-multiple-slider" data-animating="false">
                        <div class="sliders">
                            <?php foreach($data['topViewsProducts'] as $item){?>
                                <div class="single-item float-left">
                                    <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                                    <div class="single-item-card">
                                        <p><?php  echo (substr($item->name,0,15) . '...')?></p>
                                        <p class="fg-red pb-2"><?php echo  number_format($item->price*1000) ?>₫</p>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
                    <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
                </div>
            </div>   
        
    </div>
</div>

