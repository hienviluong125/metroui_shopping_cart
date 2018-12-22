<div class="container bg-white main-container">
    <div class="grid">
        <div class="row">
            <div class="cell-6">
                <div class="row">
                    <div class="cell-12">
                        <img src="<?php echo ROOTURL . '/public/img/' . $data['productDetail']->image?>" 
                            class="fotorama__img" width="80%">
                    </div>
                    <div class="cell-3">
                        <img src="<?php echo ROOTURL . '/public/img/' . $data['productDetail']->image?>" width="80%">
                    </div>
                    <?php foreach($data['imageList'] as $image){?>
                        <div class="cell-3">
                            <img src="<?php echo ROOTURL . '/public/img/' . $image->image?>" width="80%">
                        </div>
                    <?php } ?>
                </div>
               
            </div>
            <div class="cell-6">
                <h1 class="text-normal"><?php echo $data['product']['productDetail']->name; ?></h1>
                <p class="p-0 ">Loại sản phẩm: <strong><?php echo $data['product']['productDetail']->cateName; ?></strong> </p>
                <p class="p-0 ">Nhà sản xuất: <strong><?php echo $data['product']['productDetail']->brandName; ?></strong> </p>
                <p class="p-0 ">Tình Trạng : <?php echo $data['product']['productDetail']->quantity > 0 ? 'Còn hàng' : 'Hết hàng'; ?></p>
                <p class="p-0 ">Lượt xem : <?php echo $data['product']['productDetail']->views ?></p>
                <p class="p-0 ">Xuất xứ : <?php echo $data['product']['productDetail']->origin ?></p>
                <p class="p-0 ">Mô tả : <?php echo $data['product']['productDetail']->description ?></p>
                <p class="price-text ">Giá:
                    <span class="my-sale"><strong><?php echo(number_format($data['product']['productDetail']->price*1000))?>&nbsp;₫</strong> </span>
                </p>
                <button class="button primary large rounded my-shop mt-3">Đặt Hàng</button>
            </div>
        </div>
    </div>


    <div class="products  mt-5 pt-7">
            <div class="container multiple-slider">
                <div class="multiple-slider-wrapper">
                    <div id="slider_2" class="my-multiple-slider" data-animating="false">
                        <div class="sliders">
                            <!-- <?php foreach($data['hotSellingProducts'] as $item){?>
                                <div class="single-item float-left">
                                    <img src="<?php echo ROOTURL . '/public/img/' . $item->image;?>" width="186px" height="186px" />
                                    <div class="single-item-card">
                                        <p><?php  echo (substr($item->name,0,15) . '...')?></p>
                                        <p class="fg-red pb-2"><?php echo  number_format($item->price*1000) ?>₫</p>
                                        
                                    </div>
                                </div>
                            <?php } ?> -->
                        </div>
                    </div>
                    <span class="prev-multiple mif-chevron-left mif-4x  cus-arrow-right-btn "></span>
                    <span class=" next-multiple mif-chevron-right mif-4x cus-arrow-left-btn "></span>
                </div>
            </div>   
        </div>

</div>



