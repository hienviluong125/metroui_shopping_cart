<div class="container" style="margin-top:150px !important;">
    <div class="grid">
        <div class="row">
            <div class="cell-6">
                <img src="https://product.hstatic.net/1000026716/product/gearvn-razer-blackwidow-x-chroma-gunmetal-5.png"
                        class="fotorama__img" style="width: 554.869px; height: 537px; left: 0.0656743px; top: 0px;">
            </div>
            <div class="cell-6">
                <h1 class="text-normal"><?php echo $data['productDetail']->name; ?></h1>
                <p class="p-0 ">Loại sản phẩm: <strong><?php echo $data['productDetail']->cateName; ?></strong> </p>
                <p class="p-0 ">Nhà sản xuất: <strong><?php echo $data['productDetail']->brandName; ?></strong> </p>
                <p class="p-0 ">Tình Trạng : <?php echo $data['productDetail']->quantity > 0 ? 'Còn hàng' : 'Hết hàng'; ?></p>
                <p class="p-0 ">Lượt xem : <?php echo $data['productDetail']->views ?></p>
                <p class="p-0 ">Xuất xứ : <?php echo $data['productDetail']->origin ?></p>
                <p class="price-text ">Giá:
                    <span class="my-sale"><strong><?php echo(number_format($data['productDetail']->price*1000))?>&nbsp;₫</strong> </span>
                </p>

                <button class="button primary large rounded my-shop mt-3">Đặt Hàng</button>
            </div>
            <div class="cell-12 image-list">
                <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-4.png" width="70%">
                <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-3.png" width="70%">
                <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-5.png" width="70%">
            </div>
        </div>
    </div>
</div>

    <!-- <div class="grid">
            <div class="tabs tabs-wrapper top tabs-expand">

                <button class="button my-btn-mota " id="collapse_toggle_1"><strong>Mô tả</strong></button>
                <div class="pos-relative">
                    <div data-role="collapse" data-toggle-element="#collapse_toggle_1">
                        <div class="tab-image">
                            <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-4.png ">
                            <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-3.png">
                            <img src="http://hstatic.net/716/1000026716/10/2016/8-10/gearvn-5.png"> </div> <p>
                            - Switch cơ học Razer với lực nhấn kích hoạt 50g.- Tuổi thọ switch lên tới 80 triệu lượt
                            nhấn.- Công nghệ đèn nền tùy chỉnh Razer Chroma 16,8 triệu màu với led rời cao cấp trên
                            từng switch.- Thiết kế borderless với plate nhôm tạo nên thiết kế đặc trưng của dòng
                            Blackwidow X.- Phiên bản Gunmetal với plate màu xám đặc biệt.- Hỗ trợ phần mềm điều khiển
                            Razer Synapse.
                            </p>
                        </div>
                    </div>
                    <div class="arrow fg-white mt-5">
                        <div class="inner-arrow ">
                            Sản phẩm tương tự
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-3">
                            <div class="card my-card-item">
                                <div class="card-content pt-5">
                                    <div class="cart-header-content">Tên sản phẩm</div>
                                    <img src="https://product.hstatic.net/1000026716/product/gearvn_yotd_ava.png" style="width:95%">
                                </div>
                                <div class="card-footer pt-0 pb-0">
                                    <div class="btn-groups">
                                        <button class="button border-btn dark small">
                                            <span class="mif-eye"></span>&ensp;Chi tiết
                                        </button>
                                        <button class="button border-btn success small">
                                            <span class="mif-cart"></span>&ensp;Thêm giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> -->
            </div>


