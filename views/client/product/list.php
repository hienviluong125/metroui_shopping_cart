
<div class="container main-container">
<p class="ml-2 current-area cell-12"><?php echo($data['area'] . $data['current']);?></p>
    <div class="products ml-2 pt-7" >
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
                                    <button data-productid="<?php echo $product->id?>" class="button add-to-cart border-btn success float-left ">
                                        <span class="mif-cart"></span>&ensp;Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                  
        </div>            
     </div>
     
</div>

<div class="cell-12">
                <ul class="pagination dark flex-justify-center">
                         <?php if($data['page'] != 1){?>
                        <li class="page-item service"><a class="page-link" href="<?php echo ROOTURL . '/product/show/'.$data['linkto']. '/1'; ?>   "> << First</a></li>
                        <?php } ?>
                        <?php if($data['page'] > 1 ){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/product/show/'.$data['linkto']. '/' . ($data['page'] -1 );?>" >Prev ></a></li>
                        <?php } ?>
                       
                        <?php for($i = $data['page'] - 3;$i < $data['page'] + 3;$i++){?>
                            <?php if($i > 0 && $i <= $data['lastPageNumber']){?>
                                <li class="page-item <?php echo ($i == $data['page'] ? 'active' : ''); ?>"><a class="page-link" href="<?php echo ROOTURL . '/product/show/'.$data['linkto']. '/' . ($i);?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                       
                        
                        <?php if($data['page'] < $data['lastPageNumber']){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/product/show/'.$data['linkto']. '/' . ($data['page'] + 1);?>" >Next ></a></li>
                        <?php } ?>
                        
                        <?php if($data['page'] != $data['lastPageNumber']){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/product/show/'.$data['linkto']. '/' . $data['lastPageNumber'];?>" >Last >></a></li>
                        <?php } ?>
                    </ul>
        </div>