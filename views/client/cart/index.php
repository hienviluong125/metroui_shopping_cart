<div class="container main-container pt-10 my-cart">
    <?php if(count($data['cartItemList']) > 0 ){?>
        <div class="text-center">
            <h3 class="text-medium">Giỏ hàng</h3>
        </div>
        <div>
            <table class="table cart-table table-border cell-border compact text-center">
                <thead>
                    <tr clas="text-center">
                        <th>
                            <p class="my-text text-center ">STT</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Mã SP</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Sản phẩm</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Tên sản phẩm</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Số lượng</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Giá tiền</p>
                        </th>
                        <th>
                            <p class="my-text text-center ">Xóa</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i =0;$i<count($data['cartItemList']);$i++){?>
                    <tr class="cart-item">
                        <td><?php echo ($i+1);?></td>
                        <td class="cart-item-id"><?php echo $data['cartItemList'][$i]['id']?></td>
                        <td><img style="width:50px" src="public/img/<?php echo $data['cartItemList'][$i]['image']; ?>"></td>
                        <td><a class="text-medium" href="#">
                                <p class="my-btn-text"><?php echo $data['cartItemList'][$i]['name']; ?></p>
                            </a>
                        </td>
                        <td class="qty">
                        <input type="number" class="qty-input"  data-taginput value="<?php echo $data['cartItemList'][$i]['qty'];?>" data-role="spinner" data-min-value="1" data-max-value="25">
                        </td>
                        <td> <h6><?php echo number_format($data['cartItemList'][$i]['price']*1000);?>đ</h6></td>
                        <td>
                            <a href="<?php echo ROOTURL . '/cart/deleteBy/' . $data['cartItemList'][$i]['id'];?>">
                                <span class="c-pointer mif-bin mif-2x my-bin"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">
                            <h6>Tổng tiền: </h6>
                        </td>
                        <td>
                            <h6><?php echo number_format($data['totalPrice']*1000);?>đ</h6>
                        </td>
                        <td>
                            <a href="<?php echo ROOTURL . '/cart/deleteAll';?>" class="button small rounded alert ">
                                <span class="c-pointer mif-bin mif fg-white my-bin"></span>&nbsp;Hủy tất cả
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
            <a href="<?php echo ROOTURL . '/product/show/category/chuot/1';?>" class="button outline primary  rounded float-left">Mua tiếp</a>
            <a href="<?php echo ROOTURL . '/cart/checkout';?>" class="button success rounded ml-2 float-right">Thanh toán</a>
            <button class="button update-cart secondary rounded  float-right">Cập nhật</button>
           

        </div>
    <?php } else {?>
        <div class="text-center">
            <h3 class="text-medium mt-3  ">Giỏ hàng</h3>
            <h6 class="text-normal mt-6">Không có sản phẩm nào trong giỏ hàng!</h6>
            <a href="<?php echo ROOTURL . '/home';?>">
            Tiếp tục mua hàng</a>
        </div>
    <?php } ?>
 </div>


