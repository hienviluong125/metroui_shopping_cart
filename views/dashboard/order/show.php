<div class="shifted-content-2 h-100 p-ab">
    
    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <div class="row">
            <h1 class="ml-10 mt-3 mb-5 ">Danh sách đơn hàng</h1>
            <div class="cell-12">
                <div class="row">
                    <div class="text-center text-bold cell">
                        STT
                    </div>
                    <div class="text-center text-bold cell-2">
                        Mã đơn hàng
                    </div>
                    <div class="text-center text-bold cell-2">
                                Tổng tiền
                    </div>
                    <div class="text-center text-bold cell-2">
                                Ngày mua
                    </div>
                    <div class="text-center text-bold cell-2">
                                Ngày nhận
                    </div>
                    <div class="text-center text-bold cell-2">
                                Tình trạng
                    </div>
                    <div class="text-center text-bold cell">
                                Chi tiết
                    </div>
                </div>
            </div>
            <?php $stt = 1;?>
            <div class="cell-12 mt-2">
                <div class="row">
                    <?php foreach($data['orders'] as $o){?>
                        <div class="text-center cell">
                            <?php echo $stt;?>
                        </div>
                        <div class="text-center cell-2">
                        <?php echo $o['id'];?>
                        </div>
                        <div class="text-center cell-2">
                        <?php echo $o['price'];?>
                        </div>
                        <div class="text-center cell-2">
                        <?php echo $o['createddate'];?>
                        </div>
                        <div class="text-center cell-2">
                        <?php echo $o['status'] ? $o['delivereddate'] : 'Chưa nhận';?>
                        </div>
                        <div class="text-center cell-2">
                            <div class="text-center">

                            <?php if($o['status']) {?>
                                    <a style="text-decoration:none;" href="<?php echo ROOTURL . '/dashboard/order/updateOrderStatus/' . $o['id']?>" class="bg-green fg-white p-1 pl-2 pr-2 border-radius-4" >
                                        Đã giao hàng
                                    </a>
                                <?php }else{ ?>
                                    <a style="text-decoration:none;" href="<?php echo ROOTURL . '/dashboard/order/updateOrderStatus/' . $o['id']?>" class="bg-red fg-white p-1  pl-2 pr-2 border-radius-4" >
                                        Đang vận chuyển
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="cell text-center">
                            <button id="<?php echo $o['id']?>" class="bg-darkGray fg-white rounded button">Chi tiết</button>
                        </div>
                        <div class="cell-10 offset-2 mt-5">
                            <div class="pos-relative">
                                <div class="fg-black"
                                        data-role="collapse"
                                        data-toggle-element="#<?php echo $o['id'] ?>"
                                        data-collapsed="true">
                                        <table class="table">
                                            <thead>
                                            <tr class="text-center">
                                                <th class="text-center">Sản phẩm</th>
                                                <th class="text-center">Hình ảnh</th>
                                                <th class="text-center">Đơn giá</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="text-center">Tổng giá</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($o['details'] as $od){?>
                                                    <tr class="text-center">
                                                        <td><?php echo $od->name;?></td>
                                                        <td>
                                                            <img height="50px" src="<?php echo ROOTURL . '/public/img/' . $od->image?>" />
                                                        </td>
                                                        <td><?php echo $od->singlePrice;?></td>
                                                        <td><?php echo $od->quantity;?></td>
                                                        <td><?php echo $od->totalPrice;?></td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                </div>
                            </div> 
                        </div>
                    <?php $stt+=1; }?>          
                </div>
            </div>
        </div>       
        </div>
    </div>
</div>