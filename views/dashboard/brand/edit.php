<div class="shifted-content-2 h-100 p-ab">

    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <div class="row">
                <div class="cell-6">
                    <form class="ml-2" method="POST" enctype='multipart/form-data'>
                    <p class="float-left bg-orange fg-white p-2 mb-2  border-radius-4" id="add_frm">
                        <span class="mif-add"></span>
                        Sửa nhà sản xuất
                    </p>

                    <span class="float-right mif-cancel"></span>
                    <input type="text" name="name" placeholder="Nhập tên" value="<?php echo $data['editItem']->name;?>" data-role="input">
                    <input type="hidden" name="oldImage" value="<?php echo $data['editItem']->image; ?>" />
                    <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                    <button name="add" id="add-btn" type="submit" class="button rounded success mt-3">
                        Lưu
                    </button>
                    <button id="cancel-btn" class="button rounded alert mt-3">
                        Hủy
                    </button>
                    </form>
                </div>
                <div class="cell-6 previewImage">
                    <img src="<?php echo ROOTURL . '/public/img/' . $data['editItem']->image; ?>" width="200" height="200"/>
                </div>
            </div>
        </div>
    </div>
</div>