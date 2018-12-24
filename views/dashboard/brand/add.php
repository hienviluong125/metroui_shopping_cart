<div class="shifted-content-2 h-100 p-ab">

    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <div class="row">
                <form class="ml-2" id="categoryAddForm" method="POST" enctype='multipart/form-data'>
                    <p class="float-left bg-darkGrayBlue fg-white p-2 mb-2  border-radius-4" id="add_frm">
                        <span class="mif-add"></span>
                        Thêm nhà sản xuất
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
        </div>
    </div>
</div>