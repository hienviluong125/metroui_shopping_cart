<div class="container main-container pt-10 my-cart">
    <?php if($data['isSuccess']){?>
        <h1 class="text-center  ">Bạn đã thanh toán giỏ hàng thành công, đơn hàng sẽ sớm được giao đến địa chỉ trong tài khoản của bạn</h1>
        <div class="text-center">
            <div>
                <span class="mif-checkmark mif-5x fg-green"></span>
            </div>
            <a href="<?php echo ROOTURL . '/product/show/category/ban-phim/1' ;?>" class="button large outline success">Tiếp tục mua hàng</a>
            <a  href="<?php echo ROOTURL . '/home' ;?>"class="button large bg-red fg-white">Quay lại trang chủ</a>
        </div>
    <?php }else{ ?>
        <h1 class="text-center  ">Bạn chưa đăng nhập, vui lòng đăng nhập để thanh toán</h1>
        <div class="text-center">
            <a href="<?php echo ROOTURL . '/cart' ;?>" class="mt-2 button large outline success">Quay về giỏ hàng</a>
            <a  href="<?php echo ROOTURL . '/user/login' ;?>"class="mt-2 button large outline alert " target="_blank">Đăng nhập</a>
        </div>

    <?php }?>

 </div>

