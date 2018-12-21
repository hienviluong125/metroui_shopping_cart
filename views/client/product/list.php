<!-- <?php $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?> -->
<div class="container main-container">
<p class="ml-2 current-area cell-12"><?php echo($data['area'] . $data['current']);?></p>
    <div class="products  ml-2 pt-7" >
             <div class="row">
                <div class="cell-12">
                    <div class="row">
                        <?php foreach($data['products'] as $product){?>
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