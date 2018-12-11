<div class="container ">
        <div class="ml-2 slider bg-blue">
            <div class="slider-wrapper">
                <div id="my-slider">
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



        <div class="products latest ml-2 mt-10 pt-7">
            <div class="arrow arrow-orange">
                <div class="inner-arrow bg-orange ">
                    Sản phẩm mới
                </div>
            </div>
            <div class="row">
                <?php foreach($data['latestProducts'] as $product){?>
                <div class="cell-3">
                    <div class="row product m-2">
                        <div class="cell-12 ">
                            <div class="product-img text-center">
                                <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" height="137px;">
                            </div>
                        </div>
                        <div class="cell-12 mb-2">
                            <h5 class="text-left"><?php echo $product->name?></h5>
                            <p class="fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                        </div>
                        <div class="cell-12 mb-2">
                            <button class="button border-btn dark float-left mr-2">
                                <span class="mif-eye"></span>&ensp;Chi tiết
                            </button>
                            <button class="button border-btn success float-left ">
                                <span class="mif-cart"></span>&ensp;Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
                <?php }?>


            </div>

        </div>

         <div class="products top-views ml-2 mt-10 pt-7">
            <div class="arrow arrow-lighten-grey">
                <div class="inner-arrow bg-lighten-grey ">
                    Sản phẩm nhiều người quan tâm
                </div>
            </div>
            <div class="row">
                <?php foreach($data['topViewsProducts'] as $product){?>
                <div class="cell-3">
                    <div class="row product m-2">
                        <div class="cell-12 ">
                            <div class="product-img text-center">
                                <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" style="height:137px !important;">
                            </div>
                        </div>
                        <div class="cell-12 mb-2">
                            <h5 class="text-left"><?php echo $product->name?></h5>
                            <p class="fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                        </div>
                        <div class="cell-12 mb-2">
                            <button class="button border-btn dark float-left mr-2">
                                <span class="mif-eye"></span>&ensp;Chi tiết
                            </button>
                            <button class="button border-btn success float-left ">
                                <span class="mif-cart"></span>&ensp;Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
                <?php }?>


            </div>

        </div>


         <div class="products hot-selling ml-2 mt-10 pt-7">
            <div class="arrow arrow-bold-blue">
                <div class="inner-arrow bg-bold-blue ">
                    Sản phẩm hot
                </div>
            </div>
            <div class="row">
                <?php foreach($data['hotSellingProducts'] as $product){?>
                <div class="cell-3">
                    <div class="row product m-2">
                        <div class="cell-12 ">
                            <div class="product-img text-center">
                                <img src="<?php echo ROOTURL?>/public/img/<?php echo $product->image?>" style="height:137px !important;">
                            </div>
                        </div>
                        <div class="cell-12 mb-2">
                            <h5 class="text-left"><?php echo $product->name?></h5>
                            <p class="fg-red text-medium"><?php echo  number_format($product->price*1000)?>₫</h5>
                        </div>
                        <div class="cell-12 mb-2">
                            <button class="button border-btn dark float-left mr-2">
                                <span class="mif-eye"></span>&ensp;Chi tiết
                            </button>
                            <button class="button border-btn success float-left ">
                                <span class="mif-cart"></span>&ensp;Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
                <?php }?>


            </div>

        </div>




         

        </div>
    </div>