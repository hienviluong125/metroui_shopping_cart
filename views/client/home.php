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
        
        <div class="products latest mt-5 pt-7">
            <div class="arrow arrow-orange" style="top:-9.5% !important;">
                <div class="inner-arrow bg-orange ">
                    Sản phẩm mới
                </div>
            </div>
            <div class="container multiple-slider">
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



        <div class="products hot-selling mt-5 pt-7">
            <div class="arrow arrow-bold-blue" style="top:-9.5% !important;">
                <div class="inner-arrow bg-bold-blue ">
                    Sản phẩm hot
                </div>
            </div>
            <div class="container multiple-slider">
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


        



        <div class="products latest mt-5 pt-7">
            <div class="arrow arrow-orange" style="top:-9.5% !important;">
                <div class="inner-arrow bg-orange ">
                    Nhiều lượt xem
                </div>
            </div>
            <div class="container multiple-slider">
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


