<div class="shifted-content-2 h-100 p-ab">
    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>
    <div class="h-100 p-4">
        <div class="grid">
            <div class="row category-manager manager" data-state="adding">
                <div class="cell-4 adding">
                    <form id="categoryAddForm" method="POST" enctype='multipart/form-data'>
                        <p class="float-left bg-darkGrayBlue fg-white p-2 mb-2  border-radius-4" id="add_frm">
                            <span class="mif-add"></span>
                            Thêm loại sản phẩm
                        </p>
                        <input type="text" name="name" placeholder="Nhập tên" data-role="input">
                        <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                        <button name="add" id="add-btn" type="submit" class="button rounded success mt-3">
                            Thêm
                        </button>
                        <button id="cancel-btn" class="button rounded alert mt-3">
                            Hủy
                        </button>
                    </form>
                </div>
                <!--  -->
                <div class="cell-4 editing" style="display:none;">
                    
                     
                    <!-- <span class="float-right edit-close-btn mif-cancel"></span> -->
                    <form method="POST" enctype='multipart/form-data'>
                        <p class="float-left bg-orange fg-white p-2 mb-2  border-radius-4" id="add_frm">
                            <span class="mif-add"></span>
                            Sửa loại sản phẩm
                        </p>
                   
                        <span class="float-right mif-cancel"></span>
                        <input type="text" name="name" placeholder="Nhập tên" data-role="input">
                        <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                        <button name="add" id="add-btn" type="submit" class="button rounded success mt-3">
                            Lưu
                        </button>
                        <button id="cancel-btn" class="button rounded alert mt-3">
                            Hủy
                        </button>
                    </form>
                </div>
                <div class="cell-8 mt-5 ">
                    <div class="custom-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th>Hình ảnh</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['categories'] as $cate){?>
                                <tr>
                                    <td><?php echo $cate->id ?></td>
                                    <td><?php echo $cate->name ?></td>
                                    <td>
                                        <img height="50px" src="<?php echo ROOTURL . '/public/img/' . $cate->image?>"/> 
                                    </td>
                                    <td>
                                        <button class="edit-toggle-btn button border-btn success small">
                                            <span class="mif-pencil"></span>&ensp;Sửa
                                        </button>
                                        <a class="button border-btn success small bg-red fg-white">
                                            <span class="mif-bin"></span>&ensp;Xóa
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <ul data-page="1" class="pagination dark rounded flex-justify-center">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>