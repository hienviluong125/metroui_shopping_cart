<div class="container bg-white main-container">
<p class="ml-2 current-area cell-12"><?php echo($data['area']  . $data['product']['productDetail']->cateName . ' / ' . $data['product']['productDetail']->name );?></p>
    <div class="grid">
        <div class="row">
            <div class="cell-6">
                <div class="row">
                    <div class="cell-12">
                        <img class="big-img" src="<?php echo ROOTURL . '/public/img/' . $data['product']['productDetail']->image?>" class="fotorama__img"
                            width="80%">
                    </div>
                    <div class="cell-12">
                        <div class="row image-list">
                        <div class="cell-3 pl-1 pr-1">
                            <div class="img-box border bd-cyan text-center p-2">
                                <img src="<?php echo ROOTURL . '/public/img/' . $data['product']['productDetail']->image?>" width="80%">
                            </div>
                        </div>
                    <?php foreach($data['imageList'] as $image){?>
                        <div class="cell-3  pl-1 pr-1">
                            <div class="img-box border bd-white text-center p-2">
                                <img src="<?php echo ROOTURL . '/public/img/' . $image->image?>" width="80%">
                            </div>
                        </div>
                    <?php } ?>
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="cell-6">
                <h1 class="text-normal">
                    <?php echo $data['product']['productDetail']->name; ?>
                </h1>
                <p class="p-0 ">Loại sản phẩm: <strong>
                        <?php echo $data['product']['productDetail']->cateName; ?></strong> </p>
                <p class="p-0 ">Nhà sản xuất: <strong>
                        <?php echo $data['product']['productDetail']->brandName; ?></strong> </p>
                <p class="p-0 ">Tình Trạng :
                    <?php echo $data['product']['productDetail']->quantity > 0 ? 'Còn hàng' : 'Hết hàng'; ?>
                </p>
                <p class="p-0 ">Lượt xem :
                    <?php echo $data['product']['productDetail']->views ?>
                </p>
                <p class="p-0 ">Số lượng :
                    <?php echo $data['product']['productDetail']->quantity ?>
                </p>
                <p class="p-0 ">Xuất xứ :
                    <?php echo $data['product']['productDetail']->origin ?>
                </p>
                <p class="p-0 ">Mô tả :
                    <?php echo $data['product']['productDetail']->description ?>
                </p>
                <p class="price-text ">Giá:
                    <span class="my-sale"><strong>
                            <?php echo(number_format($data['product']['productDetail']->price*1000))?>&nbsp;₫</strong>
                    </span>
                </p>
                <?php if($data['product']['productDetail']->quantity < 1){?>
                    <button data-productid = "<?php echo $data['product']['productDetail']->id?>" disabled class="button add-to-cart primary large rounded bg-red mt-3">Hết hàng</button>
                <?php }else{ ?>
                    <button data-productid = "<?php echo $data['product']['productDetail']->id?>" class="button add-to-cart primary large rounded bg-red mt-3">Đặt Hàng</button>
                <?php }?>
               
            </div>
        </div>
    </div>

    <h4 class="fg-red text-center mt-10 mb-5">Sản phẩm cùng loại</h4>


    <div class="container  the-same-container multiple-slider">
        <div class="multiple-slider-wrapper">
            <div id="slider_1" class="my-multiple-slider" data-animating="false">
                <div class="sliders">
                    <?php foreach($data['product']['sameCateProduct'] as $item){?>
                    <div class="single-item float-left">
                        <a style="text-decoration:none" href="<?php echo ROOTURL . '/product/detail/' . $item->link_name?>">
                            <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                            <div class="single-item-card">
                                <p class="m-0 p-0 fg-white"><?php  echo (substr($item->name,0,15) . '...')?></p>
                                <small class="fg-red mt-1 p-0"><?php echo  number_format($item->price*1000) ?>₫</small>
                                <a class="button small bg-grayBlue fg-white " href="<?php echo ROOTURL . '/product/detail/' . $item->link_name?>" >Chi tiết</a>
                            
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
            <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
        </div>
    </div>



    <h4 class="fg-darkGreen text-center mt-10 mb-5">Sản phẩm cùng nhà sản xuất</h4>

    <div class="container  the-same-container multiple-slider mb-6">
        <div class="multiple-slider-wrapper">
            <div id="slider_2" class="my-multiple-slider" data-animating="false">
                <div class="sliders">
                    <?php foreach($data['product']['sameBrandProduct'] as $item){?>
                    <div class="single-item float-left">
                        <a style="text-decoration:none" href="<?php echo ROOTURL . '/product/detail/' . $item->link_name?>">
                            <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                            <div class="single-item-card">
                                <p class="m-0 p-0 fg-white"><?php  echo (substr($item->name,0,15) . '...')?></p>
                                <small class="fg-red mt-1 p-0"><?php echo  number_format($item->price*1000) ?>₫</small>
                                <a class="button small bg-grayBlue fg-white " href="<?php echo ROOTURL . '/product/detail/' . $item->link_name?>" >Chi tiết</a>
                            
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
            <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
        </div>
    </div>

</div>